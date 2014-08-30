/*
 *    简单JS库封装  By VVG
 *    @namespace VVG
 *    E-mail:mysheller@163.com    QQ:83816819
 */
if (!String.trim) {
    String.prototype.trim = function () {
        var reg = /^\s+|\s+$/g;
        return this.replace(reg, '');
    }
}
(function () {
    // create namespace VVG
    if (!window.VVG) {
        window.VVG = {};
    }

    function isCompatible(other) {
        // Use capability detection to check requirements
        if (other === false || !Array.prototype.push || !Object.hasOwnProperty || !document.createElement || !document.getElementsByTagName) {
            alert('你的浏览器不支持某些特性！');
            return false;
        }
        return true;
    }

    window.VVG.isCompatible = isCompatible;


    // getElementById function

    function $() {
        var elements = new Array();
        for (var i = 0; i < arguments.length; i++) {
            var element = arguments[i];
            if (typeof element == 'string') {
                element = document.getElementById(element);
            }
            if (!element) {
                continue;
            }
            // 如果只有一个参数，则返回
            if (arguments.length == 1) {
                return element;
            }
            // 多个参数的时候存为数组
            elements.push(element);
        }
        // 返回数组
        return elements;
    }

    window.VVG.$ = $;

    // 获取Parent父元素下标签名为child 的 Tags

    function $$(tag, parent) {
        parent = parent || document;
        return $(parent).getElementsByTagName(tag);
    }

    window.VVG.$$ = $$;

    // getElementsByClassName

    function $$$(str, parent, tag) {
        //父节点存在
        if (parent) {
            parent = $(parent);
        } else {
            // 未传值时，父节点为body
            parent = document;
        }
        // tagContent为节点类型，未传值时为all节点
        tag = tag || '*';
        // 在父节点查找子节点，建立空数组arr
        var els = parent.getElementsByTagName(tag),
            arr = [];
        for (var i = 0, n = els.length; i < n; i++) {
            // 查找每个节点下的classname，以空格分离为一个k数组
            for (var j = 0, k = els[i].className.split(' '), l = k.length; j < 1; j++) {
                // 当K数组中有一个值与str值相等时，记住这个标签并推入arr数组
                if (k[j] == str) {
                    arr.push(els[i]);
                    break;
                }
            }
        }
        // 返回数组
        return arr;
    }

    window.VVG.$$$ = $$$;
    window.VVG.getElementsByClassName = $$$;

    // Event事件绑定：绑定type事件到element元素，触发func函数

    function bindEvent(element, type, func) {
        if (element.addEventListener) {
            element.addEventListener(type, func, false); //false 表示冒泡
        } else if (element.attachEvent) {
            element.attachEvent('on' + type, func);
        } else {
            element['on' + type] = func;
        }
    }

    window.VVG.bindEvent = bindEvent;

    // 解除Event事件绑定

    function unbindEvent(element, type, func) {
        if (element.removeEventListener) {
            element.removeEventListener(type, func, false);
        } else if (element.detachEvent) {
            element.detachEvent('on' + type, func);
        } else {
            element['on' + type] = null;
        }
    }

    window.VVG.unbindEvent = unbindEvent;

    // 获取事件

    function getEvent(event) {
        return event || window.event;
    }

    window.VVG.getEvent = getEvent;

    // 获取事件目标

    function getTarget(event) {
        return event.target || event.srcElement;
    }

    window.VVG.getTarget = getTarget;

    // 获取鼠标位于文档的坐标

    function getMousePositionInPage(event) {
        event = getEvent(event);
        return {
            'x':event.pageX || event.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft),
            'y':event.pageY || event.clientY + (document.documentElement.scrollTop || document.body.scrollTop)
        }
    }

    window.VVG.getMousePositionInPage = getMousePositionInPage;

    // 停止事件冒泡

    function stopPropagation(event) {
        if (event.stopPropagation) {
            event.stopPropagation();
        } else {
            event.cancelBubble = true;
        }
    }

    window.VVG.stopPropagation = stopPropagation;

    // 阻止默认事件

    function preventDefault(event) {
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }
    }

    window.VVG.preventDefault = preventDefault;

    //  apply从新定义函数的执行环境

    function bindFunction(obj, func) {
        return function () {
            return func.apply(obj, arguments);
        };
    }

    window.VVG.bindFunction = bindFunction;

    // 设置透明度

    function setOpacity(node, level) {
        node = $(node);
        if (document.all) {
            node.style.filter = 'alpha(opacity=' + level + ')';
        } else {
            node.style.opacity = level / 100;
        }
    }

    window.VVG.setOpacity = setOpacity;

    // 获取可视窗口尺寸

    function getWindowSize() {
        var de = document.documentElement;
        return {
            'width':(
                window.innerWidth || (de && de.clientWidth) || document.body.clientWidth),
            'height':(
                window.innerHeight || (de && de.clientHeight) || document.body.clientHeight)
        }
    }

    window.VVG.getWindowSize = getWindowSize;

    //  数字转化为千分位格式函数

    function thousandsNumberFormat(str) {
        var n = str.length;
        var c = n % 3;
        var reg = /\d{3}(?!$)/g;
        if (n > 3) {
            var str1 = str.slice(0, c);
            var str2 = str.slice(c, n);
            str1 = str1 ? str1 + ',' : '';
            str = str1 + str2.replace(reg, function (p1) {
                return p1 + ',';
            })
        }
        return str;
    }

    window.VVG.thousandsNumberFormat = thousandsNumberFormat;

    // 带横杠的字符形式转化为驼峰式命名

    function camelize(string) {
        return string.replace(/-(\w)/g, function (strMatch, p1) {
            return p1.toUpperCase();
        });
    }

    window.VVG.camelize = camelize;

    // 驼峰式转化为横杠分隔

    function uncamelize(string, sep) {
        sep = sep || '-';
        return string.replace(/([a-z])([A-Z])/g, function (strMatch, p1, p2) {
            return p1 + sep + p2.toLowerCase();
        });
    }

    window.VVG.uncamelize = uncamelize;

    // 设置根据ID设置样式

    function setStyleById(element, cssjson) {
        element = $(element);
        for (property in cssjson) {
            if (!cssjson.hasOwnProperty(property)) continue;
            if (property == 'opacity') {
                setOpacity(element, cssjson[property]);
            } else {
                element.style[camelize(property)] = cssjson[property];
            }
        }

    }

    window.VVG.setStyleById = setStyleById;
    window.VVG.setStyle = setStyleById;

    // 根据Class类设置样式

    function setStyleByClassName(classname, cssjson, parent, tag) {
        var elements = $$$(classname, parent, tag);
        for (i = 0, n = elements.length; i < n; i++) {
            setStyleById(elements[i], cssjson);
        }
    }

    window.VVG.setStyleByClassName = setStyleByClassName;

    // 根据HTML标签TAG设置样式

    function setStyleByTagName(tag, cssjson, parent) {
        var tags = $$(tag, parent);
        for (var i = 0; i < tags.length; i++) {
            setStyleById(tags[i], cssjson);
        }
    }

    window.VVG.setStyleByTagName = setStyleByTagName;

    // 获取Element元素的className

    function getClassNames(element) {
        if (!(element = $(element))) return false;
        return element.className.replace(/\s+/g, ' ').split(' ');


    }

    window.VVG.getClassNames = getClassNames;

    // 查找element元素是否含有class

    function hasClassName(element, classname) {
        if (!(element = $(element))) return false;
        var classNames = getClassNames(element);
        for (var i = 0; i < classNames.length; i++) {
            if (classNames[i] === classname) return true;
        }
        return false;
    }

    window.VVG.hasClassName = hasClassName;

    // 增加class

    function addClassName(element, classname) {
        if (!(element = $(element))) return false;
        element.className += (element.className ? ' ' : '') + classname;
    }

    window.VVG.addClassName = addClassName;

    // 删除其中一个className

    function removeClassName(element, classname) {
        if (!(element = $(element))) return false;
        if (hasClassName(element, classname)) {
            var classtexts = getClassNames(element);
            for (var i = 0; i < classtexts.length; i++) {
                if (classtexts[i] == classname) {
                    delete(classtexts[i]);
                }
            }
            element.className = classtexts.join(' ');
        }

    }

    window.VVG.removeClassName = removeClassName;

    // 增加一个外部链接CSS

    function addStyleSheet(url, media) {
        media = media || 'screen';
        var link = document.createElement('LINK');
        link.setAttribute('rel', 'stylesheet');
        link.setAttribute('type', 'text/css');
        link.setAttribute('href', url);
        link.setAttribute('media', media);
        document.getElementsByTagName('head')[0].appendChild(link);
    }

    window.VVG.addStyleSheet = addStyleSheet;

    // 删除一个外部链接CSS

    function removeStyleSheet(url) {
        var stylesheets = document.getElementsByTagName('link');
        for (var i = 0; i < stylesheets.length; i++) {
            if (!(stylesheets[i].href.indexOf(url) == -1)) {
                stylesheets[i].parentNode.removeChild(stylesheets[i]);
                return true;
            }
        }
        return false;
    }

    window.VVG.removeStyleSheet = removeStyleSheet;

    // COOKIE 操作

    function getCookie(name) {
        var start = document.cookie.indexOf(name + "=");
        var len = start + name.length + 1;
        if ((!start) && (name != document.cookie.substring(0, name.length))) {
            return null;
        }
        if (start == -1) return null;
        var end = document.cookie.indexOf(";", len);
        if (end == -1) end = document.cookie.length;
        return unescape(document.cookie.substring(len, end));
    }

    window.VVG.getCookie = getCookie;

    function setCookie(name, value, expires, path, domain, secure) {
        var today = new Date();
        today.setTime(today.getTime());
        if (expires) {
            expires = expires * 1000 * 60 * 60 * 24;
        }
        var expires_date = new Date(today.getTime() + (expires));
        document.cookie = name + "=" + escape(value) + ((expires) ? ";expires=" + expires_date.toGMTString() : "") + ((path) ? ";path=" + path : "") + ((domain) ? ";domain=" + domain : "") + ((secure) ? ";secure" : "");
    }

    window.VVG.setCookie = setCookie;

    function deleteCookie(name, path, domain) {
        if (getCookie(name)) document.cookie = name + "=" + ((path) ? ";path=" + path : "") + ((domain) ? ";domain=" + domain : "") + ";expires=Thu, 01-Jan-1970 00:00:01 GMT";
    }

    window.VVG.deleteCookie = deleteCookie;

    // ajax对象操作
    // 安全过滤JSON的函数parseJSON

    function parseJSON(s, filter) {
        var j;

        function walk(k, v) {
            var i;
            if (v && typeof v === 'object') {
                for (i in v) {
                    if (v.hasOwnProperty(i)) {
                        v[i] = walk(i, v[i]);
                    }
                }
            }
            return filter(k, v);
        }

        if (/^("(\\.|[^"\\\n\r])*?"|[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t])+?$/.test(s)) {
            try {
                j = eval('(' + s + ')');
            } catch (e) {
                throw new SyntaxError("parseJSON");
            }
        } else {
            throw new SyntaxError("parseJSON");
        }
        if (typeof filter === 'function') {
            j = walk('', j);
        }
        return j;
    }

    // 创建一个XMLHttpRequest对象

    function getRequestObject(url, options) {
        var req = false;
        if (window.XMLHttpRequest) {
            req = new window.XMLHttpRequest();
        } else if (window.ActiveXObject) {
            req = new window.ActiveXObject('Microsoft.XMLHTTP');
        }
        if (!req) return false;
        // 设置默认数据
        options = options || {};
        options.method = options.method || 'GET';
        options.send = options.send || null;
        // 定义事件侦听函数
        req.onreadystatechange = function () {
            switch (req.readyState) {
                case 1:
                    // 正在载入
                    if (options.loadListener) {
                        options.loadListener.apply(req, arguments);
                    }
                    break;
                case 2:
                    // 载入完成
                    if (options.loadedListener) {
                        options.loadedListener.apply(req, arguments);
                    }
                    break;
                case 3:
                    // 正在交互
                    if (options.ineractiveListener) {
                        options.ineractiveListener.apply(req, arguments);
                    }
                    break;
                case 4:
                    // 交互完成
                    try {
                        if (req.status && req.status == 200) {
                            // 获取文件格式
                            // 为不同的content-type设置对应的方法
                            var contentType = req.getResponseHeader('Content-Type');
                            var mimeType = contentType.match(/\s*([^;]+)\s*(;|$)/i)[1];
                            switch (mimeType) {
                                case 'text/plain':
                                    if (options.txtResponseListener) {
                                        options.txtResponseListener.call(req, req.responseText);
                                    }
                                    break;
                                case 'text/javascript':
                                case 'application/javascript':
                                    if (options.jsResponseListener) {
                                        options.jsResponseListener.call(req, req.responseText);
                                    }
                                    break;
                                case 'application/json':
                                    if (options.jsonResponseListener) {
                                        try {
                                            var json = parseJSON(req.responseText);
                                        } catch (e) {
                                            json = false;
                                        }
                                        options.jsonResponseListener.call(req, json);
                                    }
                                    break;
                                case 'text/xml':
                                case 'application/xml':
                                case 'application/xhtml+xml':
                                    if (options.xmlResponseListener) {
                                        options.xmlResponseListener.call(req, req.responseXML);
                                    }
                                    break;
                                case 'text/html':
                                    if (options.htmlResponseListener) {
                                        options.htmlResponseListener.call(req, req.responseText);
                                    }
                                    break;
                            }
                            if (options.completeListener) {
                                options.completeListener.apply(req, arguments);
                            }
                        } else {
                            if (options.errorListener) {
                                options.errorListener.apply(req, arguments);
                            }
                        }

                    } catch (e) {
                        //ignore errors
                        //alert('Response Error: ' + e);
                    }
                    break;
            }
        };
        // Open the request
        req.open(options.method, url, true);
        // 添加一个header识别标记
        req.setRequestHeader('VVG-Base-Ajax-Request', 'AjaxRequest');
        return req;
    }

    window.VVG.getRequestObject = getRequestObject;

    // 简易包装send方法与发送XMLHttpRequest请求

    function ajaxRequest(url, options) {
        var req = getRequestObject(url, options);
        return req.send(options.send);
    }

    window.VVG.ajaxRequest = ajaxRequest;
})();