var scrolltotop = {
    setting: {
        startline: 50,
        scrollto: 0,
        scrollduration: 200,
        fadeduration: [300, 100]
    },
    controlHTML: '<img src="https://lh3.googleusercontent.com/pw/AM-JKLWi05EDA1z4nVnk_t_9TUa6vC8a8F6TxPnarMGEFNS4hp4Ci-X5UcNjOrD-IKn4UOvtwWINIuo01C6azvNEQ4URQOkSzieCG8y9OFZHLhRRpAgp7BFckIr6CMxmq1OKi9yWWmqz-RgdY8yv6dGdKRqk=s51-no" />',
    controlattrs: {
        offsetx: 40,
        offsety: 20
    },
    anchorkeyword: "#top",
    state: {
        isvisible: false,
        shouldvisible: false
    },
    scrollup: function() {
        this.cssfixedsupport || this.$control.css({
            opacity: 0
        });
        var t = isNaN(this.setting.scrollto) ? this.setting.scrollto : parseInt(this.setting.scrollto);
        t = typeof t === "string" && jQuery("#" + t).length === 1 ? jQuery("#" + t).offset().top : 0;
        this.$body.animate({
            scrollTop: t
        }, this.setting.scrollduration);
    },
    keepfixed: function() {
        var t = jQuery(window),
            o = t.scrollLeft() + t.width() - this.$control.width() - this.controlattrs.offsetx,
            s = t.scrollTop() + t.height() - this.$control.height() - this.controlattrs.offsety;
        this.$control.css({
            left: o + "px",
            top: s + "px"
        });
    },
    togglecontrol: function() {
        var t = jQuery(window).scrollTop();
        this.cssfixedsupport || this.keepfixed();
        this.state.shouldvisible = t >= this.setting.startline ? true : false;
        if (this.state.shouldvisible && !this.state.isvisible) {
            this.$control.stop().animate({
                opacity: 1
            }, this.setting.fadeduration[0]);
            this.state.isvisible = true;
        } else if (this.state.shouldvisible === false && this.state.isvisible) {
            this.$control.stop().animate({
                opacity: 0
            }, this.setting.fadeduration[1]);
            this.state.isvisible = false;
        }
    },
    init: function() {
        jQuery(document).ready(function(t) {
            var o = scrolltotop,
                s = document.all;
            o.cssfixedsupport = !s || (s && document.compatMode === "CSS1Compat" && window.XMLHttpRequest);
            o.$body = t(window.opera ? "CSS1Compat" === document.compatMode ? "html" : "body" : "html,body");
            o.$control = t('<div id="topcontrol">' + o.controlHTML + "</div>").css({
                position: o.cssfixedsupport ? "fixed" : "absolute",
                bottom: o.controlattrs.offsety,
                right: o.controlattrs.offsetx,
                opacity: 0,
                cursor: "pointer"
            }).attr({
                title: "Scroll to Top"
            }).click(function() {
                return o.scrollup(), false;
            }).appendTo("body");
            if (document.all && !window.XMLHttpRequest && o.$control.text() !== "") {
                o.$control.css({
                    width: o.$control.width()
                });
            }
            o.togglecontrol();
            t('a[href="' + o.anchorkeyword + '"]').click(function() {
                return o.scrollup(), false;
            });
            t(window).bind("scroll resize", function() {
                o.togglecontrol();
            });
        });
    }
};
scrolltotop.init();
