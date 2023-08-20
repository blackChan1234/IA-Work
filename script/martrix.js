(function(window, factory) {
    if (typeof define === 'function' && define.amd) {
        // amd
        define(factory);
    } else if (typeof module === 'object' && module.exports) {
        // cmd
        module.exports = factory();
    } else {
        // window
        window.martrix = factory()
    }
})(typeof window !== 'undefined' ? window : this, function() {
    var martrix = function(selector, userOptions) {
        'use strict';

        var options = {
            cW: 1368,
            cH: 600,
            wordColor: '#0F0',
            fontSize: 16,
            speed: 0.01,
            words: "0123456789qwertyuiopasdfghjklzxcvbnm,./;'\[]QWERTYUIOP{}ASDFGHJHJKL:ZXCVBBNM<>?"
        };

        var canvas,
            ctx,
            W,
            H,
            columns,
            wordsArr,
            drops = [];

        // 混合函数
        var mergeOptions = function(userOptions, options) {
            Object.keys(userOptions).forEach(function(key) {
                options[key] = userOptions[key];
            });
        };

        var draw = function() {
            ctx.save();
            ctx.fillStyle = options.wordColor;
            ctx.font = options.fontSize + 'px Arial';
            ctx.fontWeight = options.fontWeight;
            for (var i = 0; i < drops.length; i++) {
                var text = wordsArr[Math.floor(Math.random() * wordsArr.length)];
                ctx.fillText(text, i * options.fontSize, drops[i] * options.fontSize);
                if (drops[i] * options.fontSize > H && Math.random() > 0.98) {
                    drops[i] = 0;
                }
                drops[i]++;
            }
            ctx.restore();
        };

        var initSetup = function(selector, userOptions) {
            mergeOptions(userOptions, options);

            canvas = document.querySelector(selector);
            ctx = canvas.getContext('2d');

            canvas.width = W = options.cW;
            canvas.height = H = options.cH;

            columns = options.cW / options.fontSize;
            wordsArr = options.words.split('');

            for (var i = 0; i < columns; i++) {
                drops[i] = 1;
            }

            (function drawFrame() {
                window.requestAnimationFrame(drawFrame);
                ctx.fillStyle = 'rgba(0, 0, 0, ' + options.speed + ')';
                ctx.fillRect(0, 0, W, H);
                draw();
            })();
        };

        initSetup(selector, userOptions);
    }

    return martrix;
});

(function(window, document) {
    window.addEventListener('DOMContentLoaded', function(e) {
        martrix('#canvas', {
            cW: document.documentElement.clientWidth,
            cH: document.documentElement.clientHeight,
            wordColor: '#0F0',
            fontSize: 13,
            speed: 0.05
        });
    }, false);
})(window, document);