// Credit for the convert functions goes all to strukturag git repo: https://github.com/strukturag/libheif //

(function () {

    var saveSupported = false;

    // IE polyfill for Canvas.toBlob
    if (!HTMLCanvasElement.prototype.toBlob) {
        Object.defineProperty(HTMLCanvasElement.prototype, 'toBlob', {
            value: function (callback, type, quality) {
                var canvas = this;
                setTimeout(function () {

                    var binStr = atob(canvas.toDataURL(type, quality).split(',')[1]),
                        len = binStr.length,
                        arr = new Uint8Array(len);

                    for (var i = 0; i < len; i++) {
                        arr[i] = binStr.charCodeAt(i);
                    }

                    callback(new Blob([arr], {
                        type: type || 'image/png'
                    }));
                });
            }
        });
    }

     function show(id) {
         document.getElementById(id).style.display = "block";
     }

     function hide(id) {
         document.getElementById(id).style.display = "none";
     }

    function addClass(elem, classname) {
        if (elem.classList) {
            elem.classList.add(classname);
        } else {
            var arr = elem.className.split(" ");
            if (arr.indexOf(classname) === -1) {
                elem.className += " " + classname;
            }
        }
    }

    function removeClass(elem, classname) {
        if (elem.classList) {
            elem.classList.remove(classname);
        } else {
            var arr = elem.className.split(" ");
            var i = arr.indexOf(classname);
            if (i >= 0) {
                arr.splice(i, 1);
                elem.className = arr.join(" ");
            }
        }
    }

    var CanvasDrawer = function (canvas) {
        this.canvas = canvas;
        this.ctx = canvas.getContext("2d");
        this.image_data = null;
        this.container = document.getElementById("container");
    };

    CanvasDrawer.prototype.draw = function (image) {
        var w = image.get_width();
        var h = image.get_height();
        if (w != this.canvas.width || h != this.canvas.height ||
            !this.image_data) {
            this.canvas.width = w;
            this.canvas.height = h;
            if (w > document.body.clientWidth) {
                addClass(this.container, "flexible-size");
                this.container.style["padding-bottom"] = String(100 * (h / w)) + "%";
            } else {
                removeClass(this.container, "flexible-size");
                this.container.style["padding-bottom"] = "";
            }
            this.image_data = this.ctx.createImageData(w, h);
            var image_data = this.image_data.data;
            // Start with a white image.
            for (var i = 0; i < w * h; i++) {
                image_data[i * 4 + 3] = 255;
            }
        }

        image.display(this.image_data, function (display_image_data) {
            hide("decoding");
            if (!display_image_data) {
                show("error-format");
                return;
            }

            show("container");
            if (saveSupported) {
                show("save-container");
            } else {
                hide("save-container");
            }
            if (window.requestAnimationFrame) {
                this.pending_image_data = display_image_data;
                window.requestAnimationFrame(function () {
                    if (this.pending_image_data) {
                        this.ctx.putImageData(this.pending_image_data, 0, 0);
                        this.pending_image_data = null;
                    }
                }.bind(this));
            } else {
                this.ctx.putImageData(display_image_data, 0, 0);
            }
        }.bind(this));
    };

    function HeifDemo(libheif) {
        this.libheif = libheif;
        this.canvas = document.getElementById("canvas");
        this.downloads = document.getElementById("downloads");
        this.image_data = [];
        this.images_select = document.getElementById("images");
        this.images_select.addEventListener("change", function (event) {
            var index = parseInt(event.target.value, 10);
            if (index >= 0 && index < this.image_data.length) {
                this._showImage(this.image_data[index]);
            }
        }.bind(this));
        this.drawer = new CanvasDrawer(canvas);
        this.decoder = new libheif.HeifDecoder();
        saveSupported = this.canvas.toBlob &&
            ((URL && URL.createObjectURL) || navigator.msSaveOrOpenBlob);
        if (saveSupported) {
            console.log("Saving images is supported in this browser.");
        } else {
            console.warn("Saving images is not supported in this browser.");
        }
    }

    HeifDemo.prototype.reset = function () {
        this.canvas.width = 0;
        this.canvas.height = 0;
    };

    HeifDemo.prototype.loadUrl = function (url) {
        var request = new XMLHttpRequest();
        console.log("Downloading", url);
        request.open("get", url, true);
        request.responseType = "arraybuffer";
        hide("container");
        show("loading");
        request.onload = function (event) {
            hide("loading");
            if (request.status !== 200) {
                console.log("Downloading failed", request);
                return;
            }

            var data = request.response;
            var remaining = data.byteLength;
            console.log("Received", remaining, "bytes");
            var buffer = new Uint8Array(data, 0, remaining);
            var filename = url.substring(url.lastIndexOf('/') + 1);
            this.loadBuffer(buffer, filename);
        }.bind(this);
        request.send();
    };

    HeifDemo.prototype.loadBuffer = function (buffer, filename) {
        this.filename = filename;
        hide("error-format");
        hide("container");
        hide("save-container");
        show("loading");
        for (var i = 0; i < this.image_data.length; i++) {
            this.image_data[i].free();
        }
        this.image_data = this.decoder.decode(buffer);
        hide("loading");
        if (!this.image_data || !this.image_data.length) {
            show("error-format");
            return false;
        }
        this._showImage(this.image_data[0]);
        if (this.image_data.length > 1) {
            show("images");
            while (this.images_select.firstChild) {
                this.images_select.removeChild(this.images_select.firstChild);
            }
            for (var i = 0; i < this.image_data.length; i++) {
                var option = document.createElement("option");
                option.setAttribute("value", i);
                var label = document.createTextNode("Image " + (i + 1));
                option.appendChild(label);
                this.images_select.appendChild(option);
            }
        } else {
            hide("images");
        }
        return true;
    };

    HeifDemo.prototype._showImage = function (image) {
        this.reset();
        hide("container");
        hide("save-container");
        show("decoding");
        this.drawer.draw(image);
    };

    HeifDemo.prototype.saveImage = function (format) {
        if (!saveSupported) {
            alert("Saving images is not supported with your browser.");
            return;
        }

        if (!format) {
            format = "image/jpeg";
        }
        while (this.downloads.firstChild) {
            this.downloads.removeChild(this.downloads.firstChild);
        }

        var FILE_EXTENSIONS = {
            "image/jpeg": ".jpeg",
            "image/png": ".png"
        };
        this.canvas.toBlob(function (blob) {
            var extension = FILE_EXTENSIONS[blob.type] || ".bin";
            var basename = this.filename.replace(/\.[^/.]+$/, "");
            if (navigator.msSaveOrOpenBlob) {
                navigator.msSaveOrOpenBlob(blob, basename + extension);
                return;
            }

            var url = URL.createObjectURL(blob);
            var dlink = document.createElement("a");
            dlink.download = basename + extension;
            dlink.href = url;
            this.downloads.appendChild(dlink);
            dlink.click();
            URL.revokeObjectURL(url);
        }.bind(this), format);
    };

    window.onload = function () {
        hide("loading");
        if (typeof libheif === "undefined") {
            alert("libheif could not be loaded, please check your browser console for details.");
            return;
        }

        console.log("Using libheif", libheif.heif_get_version());
        var demo = new HeifDemo(libheif);

        show("form");

        document.getElementById("file").addEventListener("change", function (event) {
            var files = event.target.files;
            if (!files || !files.length) {
                return;
            }

            hide("container");
            hide("error-format");
            hide("decoding");
            show("loading");
            demo.reset();
            var file = files[0];
            var reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    hide("container");
                    hide("save-container");
                    setTimeout(function () {
                        var buffer = e.target.result;
                        if (!demo.loadBuffer(buffer, theFile.name)) {
                            hide("container");
                            show("error-format");
                        }
                    }, 1);
                };
            })(file);
            reader.readAsArrayBuffer(file);
        });

        document.getElementById("save").addEventListener("click", function (event) {
            demo.saveImage();
        });

    };

}).call();