(function(h, m) {
    var y = {},
    j = {},
    t = {},
    i = {
        autoLoad: !0,
        timeout: 6E3,
        defaultPath: "http://localhost:188/images/%s.min.js",
        coreLib: ["http://localhost:188/images/jquery.min.js"],
        mods: {}
    },
    l,
    f = m.getElementsByTagName("script");
    l = f[f.length - 1];
    var n = [],
    u = [],
    z = !1,
    v = {},
    q = {},
    w = function(a, b, c, d) {
        var g, e, f, o, j = function() {
            y[a] = 1;
            d && d(a);
            d = null;
            h.clearTimeout(g)
        };
        if (a) {
            var k = a; - 1 == k.indexOf("http://") && (k = i.defaultPath.replace("%s", k)); - 1 == k.indexOf("?") && (k = k + "?t=" + GUANGER.staticVersion);
            y[a] ? (t[a] = !1, d && d(a)) : t[a] ? setTimeout(function() {
                w(a, b, c, d)
            },
            10) : (t[a] = !0, g = h.setTimeout(function() {
                if (i.timeoutCallback) try {
                    i.timeoutCallback(a)
                } catch(b) {}
            },
            i.timeout), f = b || k.toLowerCase().split(/\./).pop().replace(/[\?#].*/, ""), "js" === f ? (e = m.createElement("script"), e.setAttribute("type", "text/javascript"), e.setAttribute("src", k), e.setAttribute("async", !0)) : "css" === f && (e = m.createElement("link"), e.setAttribute("type", "text/css"), e.setAttribute("rel", "stylesheet"), e.setAttribute("href", k)), c && (e.charset = c), "css" === f ? (o = new Image, o.onerror = function() {
                j();
                o = o.onerror = null
            },
            o.src = k) : (e.onerror = function() {
                j();
                e.onerror = null
            },
            e.onload = e.onreadystatechange = function() {
                if (!this.readyState || this.readyState === "loaded" || this.readyState === "complete") {
                    j();
                    e.onload = e.onreadystatechange = null
                }
            }), l.parentNode.insertBefore(e, l))
        }
    },
    r = function(a, b) {
        function c() {--f || (j[d] = 1, b())
        }
        var d, g, e = 0,
        f;
        d = a.join("");
        f = a.length;
        if (j[d]) b();
        else for (; g = a[e++];) {
            var h = i.mods,
            l = void 0;
            g = l = "string" === typeof g ? h[g] ? h[g] : {
                path: g
            }: g;
            g.requires ? r(g.requires,
            function(a) {
                return function() {
                    w(a.path, a.type, a.charset, c)
                }
            } (g)) : w(g.path, g.type, g.charset, c)
        }
    },
    E = function() {
        var a = 0,
        b;
        if (u.length) for (; b = u[a++];) c.apply(this, b)
    },
    c = function() {
        var a = [].slice.call(arguments),
        b,
        d;
        i.autoLoad && !j[i.coreLib.join("")] ? r(i.coreLib,
        function() {
            c.apply(null, a)
        }) : 0 < n.length && !j[n.join("")] ? r(n,
        function() {
            c.apply(null, a)
        }) : ("function" === typeof a[a.length - 1] && (b = a.pop()), d = a.join(""), (0 === a.length || j[d]) && b ? b() : r(a,
        function() {
            j[d] = 1;
            b && b()
        }))
    };
    c.add = function(a, b) {
        a && (b && b.path) && (i.mods[a] = b)
    };
    c.delay = function() {
        var a = [].slice.call(arguments),
        b = a.shift();
        h.setTimeout(function() {
            c.apply(this, a)
        },
        b)
    };
    c.global = function() {
        var a = arguments[0].constructor === Array ? arguments[0] : [].slice.call(arguments);
        n = n.concat(a)
    };
    c.ready = function() {
        var a = [].slice.call(arguments);
        if (z) return c.apply(this, a);
        u.push(a)
    };
    c.css = function(a) {
        var b = m.getElementById("do-inline-css");
        b || (b = m.createElement("style"), b.type = "text/css", b.id = "do-inline-css", l.parentNode.insertBefore(b, l));
        b.styleSheet ? b.styleSheet.cssText += a: b.appendChild(m.createTextNode(a))
    };
    c.setData = c.setPublicData = function(a, b) {
        var c = q[a];
        v[a] = b;
        if (c) for (; 0 < c.length;) c.pop().call(this, b)
    };
    c.getData = c.getPublicData = function(a, b) {
        v[a] ? b(v[a]) : (q[a] || (q[a] = []), q[a].push(function(a) {
            b(a)
        }))
    };
    c.setConfig = function(a, b) {
        i[a] = b;
        return c
    };
    c.getConfig = function(a) {
        return i[a]
    };
    h.Do = c;
    var A = function() {
        z = !0;
        E()
    },
    B = !1,
    f = !0,
    d = h.document,
    C = d.documentElement,
    x = d.addEventListener ? "addEventListener": "attachEvent",
    F = d.addEventListener ? "removeEventListener": "detachEvent",
    s = d.addEventListener ? "": "on",
    p = function(a) {
        if (! ("readystatechange" == a.type && "complete" != d.readyState) && (("load" == a.type ? h: d)[F](s + a.type, p, !1), !B && (B = !0))) A.call(h, a.type || a)
    },
    D = function() {
        try {
            C.doScroll("left")
        } catch(a) {
            setTimeout(D, 50);
            return
        }
        p("poll")
    };
    if ("complete" == d.readyState) A.call(h, "lazy");
    else {
        if (d.createEventObject && C.doScroll) {
            try {
                f = !h.frameElement
            } catch(G) {}
            f && D()
        }
        d[x](s + "DOMContentLoaded", p, !1);
        d[x](s + "readystatechange", p, !1);
        h[x](s + "load", p, !1)
    }
    if (f = l.getAttribute("data-cfg-autoload")) i.autoLoad = "true" === f.toLowerCase() ? !0 : !1;
    if (f = l.getAttribute("data-cfg-corelib")) i.coreLib = f.split(",")
})(window, document);