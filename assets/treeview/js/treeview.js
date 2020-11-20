!(function (a, b, c, d) {
    "use strict";
    var e = "treeview",
        f = {};
    (f.settings = {
        injectStyle: !0,
        levels: 2,
        expandIcon: "glyphicon glyphicon-plus",
        collapseIcon: "glyphicon glyphicon-minus",
        emptyIcon: "glyphicon",
        nodeIcon: "",
        selectedIcon: "",
        checkedIcon: "glyphicon glyphicon-check",
        uncheckedIcon: "glyphicon glyphicon-unchecked",
        color: d,
        backColor: d,
        borderColor: d,
        onhoverColor: "#F5F5F5",
        selectedColor: "#FFFFFF",
        selectedBackColor: "#428bca",
        searchResultColor: "#D9534F",
        searchResultBackColor: d,
        enableLinks: !1,
        highlightSelected: !0,
        highlightSearchResults: !0,
        showBorder: !0,
        showIcon: !0,
        showCheckbox: !1,
        showTags: !1,
        multiSelect: !1,
        onNodeChecked: d,
        onNodeCollapsed: d,
        onNodeDisabled: d,
        onNodeEnabled: d,
        onNodeExpanded: d,
        onNodeSelected: d,
        onNodeUnchecked: d,
        onNodeUnselected: d,
        onSearchComplete: d,
        onSearchCleared: d,
    }),
        (f.options = { silent: !1, ignoreChildren: !1 }),
        (f.searchOptions = { ignoreCase: !0, exactMatch: !1, revealResults: !0 });
    var g = function (b, c) {
        return (
            (this.$element = a(b)),
            (this.elementId = b.id),
            (this.styleId = this.elementId + "-style"),
            this.init(c),
            {
                options: this.options,
                init: a.proxy(this.init, this),
                remove: a.proxy(this.remove, this),
                getNode: a.proxy(this.getNode, this),
                getParent: a.proxy(this.getParent, this),
                getSiblings: a.proxy(this.getSiblings, this),
                getSelected: a.proxy(this.getSelected, this),
                getUnselected: a.proxy(this.getUnselected, this),
                getExpanded: a.proxy(this.getExpanded, this),
                getCollapsed: a.proxy(this.getCollapsed, this),
                getChecked: a.proxy(this.getChecked, this),
                getUnchecked: a.proxy(this.getUnchecked, this),
                getDisabled: a.proxy(this.getDisabled, this),
                getEnabled: a.proxy(this.getEnabled, this),
                selectNode: a.proxy(this.selectNode, this),
                unselectNode: a.proxy(this.unselectNode, this),
                toggleNodeSelected: a.proxy(this.toggleNodeSelected, this),
                collapseAll: a.proxy(this.collapseAll, this),
                collapseNode: a.proxy(this.collapseNode, this),
                expandAll: a.proxy(this.expandAll, this),
                expandNode: a.proxy(this.expandNode, this),
                toggleNodeExpanded: a.proxy(this.toggleNodeExpanded, this),
                revealNode: a.proxy(this.revealNode, this),
                checkAll: a.proxy(this.checkAll, this),
                checkNode: a.proxy(this.checkNode, this),
                uncheckAll: a.proxy(this.uncheckAll, this),
                uncheckNode: a.proxy(this.uncheckNode, this),
                toggleNodeChecked: a.proxy(this.toggleNodeChecked, this),
                disableAll: a.proxy(this.disableAll, this),
                disableNode: a.proxy(this.disableNode, this),
                enableAll: a.proxy(this.enableAll, this),
                enableNode: a.proxy(this.enableNode, this),
                toggleNodeDisabled: a.proxy(this.toggleNodeDisabled, this),
                search: a.proxy(this.search, this),
                clearSearch: a.proxy(this.clearSearch, this),
            }
        );
    };
    (g.prototype.init = function (b) {
        (this.tree = []),
            (this.nodes = []),
            b.data && ("string" == typeof b.data && (b.data = a.parseJSON(b.data)), (this.tree = a.extend(!0, [], b.data)), delete b.data),
            (this.options = a.extend({}, f.settings, b)),
            this.destroy(),
            this.subscribeEvents(),
            this.setInitialStates({ nodes: this.tree }, 0),
            this.render();
    }),
        (g.prototype.remove = function () {
            this.destroy(), a.removeData(this, e), a("#" + this.styleId).remove();
        }),
        (g.prototype.destroy = function () {
            this.initialized && (this.$wrapper.remove(), (this.$wrapper = null), this.unsubscribeEvents(), (this.initialized = !1));
        }),
        (g.prototype.unsubscribeEvents = function () {
            this.$element.off("click"),
                this.$element.off("nodeChecked"),
                this.$element.off("nodeCollapsed"),
                this.$element.off("nodeDisabled"),
                this.$element.off("nodeEnabled"),
                this.$element.off("nodeExpanded"),
                this.$element.off("nodeSelected"),
                this.$element.off("nodeUnchecked"),
                this.$element.off("nodeUnselected"),
                this.$element.off("searchComplete"),
                this.$element.off("searchCleared");
        }),
        (g.prototype.subscribeEvents = function () {
            this.unsubscribeEvents(),
                this.$element.on("click", a.proxy(this.clickHandler, this)),
                "function" == typeof this.options.onNodeChecked && this.$element.on("nodeChecked", this.options.onNodeChecked),
                "function" == typeof this.options.onNodeCollapsed && this.$element.on("nodeCollapsed", this.options.onNodeCollapsed),
                "function" == typeof this.options.onNodeDisabled && this.$element.on("nodeDisabled", this.options.onNodeDisabled),
                "function" == typeof this.options.onNodeEnabled && this.$element.on("nodeEnabled", this.options.onNodeEnabled),
                "function" == typeof this.options.onNodeExpanded && this.$element.on("nodeExpanded", this.options.onNodeExpanded),
                "function" == typeof this.options.onNodeSelected && this.$element.on("nodeSelected", this.options.onNodeSelected),
                "function" == typeof this.options.onNodeUnchecked && this.$element.on("nodeUnchecked", this.options.onNodeUnchecked),
                "function" == typeof this.options.onNodeUnselected && this.$element.on("nodeUnselected", this.options.onNodeUnselected),
                "function" == typeof this.options.onSearchComplete && this.$element.on("searchComplete", this.options.onSearchComplete),
                "function" == typeof this.options.onSearchCleared && this.$element.on("searchCleared", this.options.onSearchCleared);
        }),
        (g.prototype.setInitialStates = function (b, c) {
            if (b.nodes) {
                c += 1;
                var d = b,
                    e = this;
                a.each(b.nodes, function (a, b) {
                    (b.nodeId = e.nodes.length),
                        (b.parentId = d.nodeId),
                        b.hasOwnProperty("selectable") || (b.selectable = !0),
                        (b.state = b.state || {}),
                        b.state.hasOwnProperty("checked") || (b.state.checked = !1),
                        b.state.hasOwnProperty("disabled") || (b.state.disabled = !1),
                        b.state.hasOwnProperty("expanded") || (!b.state.disabled && c < e.options.levels && b.nodes && b.nodes.length > 0 ? (b.state.expanded = !0) : (b.state.expanded = !1)),
                        b.state.hasOwnProperty("selected") || (b.state.selected = !1),
                        e.nodes.push(b),
                        b.nodes && e.setInitialStates(b, c);
                });
            }
        }),
        (g.prototype.clickHandler = function (b) {
            this.options.enableLinks || b.preventDefault();
            var c = a(b.target),
                d = this.findNode(c);
            if (d && !d.state.disabled) {
                var e = c.attr("class") ? c.attr("class").split(" ") : [];
                -1 !== e.indexOf("expand-icon")
                    ? (this.toggleExpandedState(d, f.options), this.render())
                    : -1 !== e.indexOf("check-icon")
                    ? (this.toggleCheckedState(d, f.options), this.render())
                    : (d.selectable ? this.toggleSelectedState(d, f.options) : this.toggleExpandedState(d, f.options), this.render());
            }
        }),
        (g.prototype.findNode = function (a) {
            var b = a.closest("li.list-group-item").attr("data-nodeid"),
                c = this.nodes[b];
            return c || console.log("Error: node does not exist"), c;
        }),
        (g.prototype.toggleExpandedState = function (a, b) {
            a && this.setExpandedState(a, !a.state.expanded, b);
        }),
        (g.prototype.setExpandedState = function (b, c, d) {
            c !== b.state.expanded &&
                (c && b.nodes
                    ? ((b.state.expanded = !0), d.silent || this.$element.trigger("nodeExpanded", a.extend(!0, {}, b)))
                    : c ||
                      ((b.state.expanded = !1),
                      d.silent || this.$element.trigger("nodeCollapsed", a.extend(!0, {}, b)),
                      b.nodes &&
                          !d.ignoreChildren &&
                          a.each(
                              b.nodes,
                              a.proxy(function (a, b) {
                                  this.setExpandedState(b, !1, d);
                              }, this)
                          )));
        }),
        (g.prototype.toggleSelectedState = function (a, b) {
            a && this.setSelectedState(a, !a.state.selected, b);
        }),
        (g.prototype.setSelectedState = function (b, c, d) {
            c !== b.state.selected &&
                (c
                    ? (this.options.multiSelect ||
                          a.each(
                              this.findNodes("true", "g", "state.selected"),
                              a.proxy(function (a, b) {
                                  this.setSelectedState(b, !1, d);
                              }, this)
                          ),
                      (b.state.selected = !0),
                      d.silent || this.$element.trigger("nodeSelected", a.extend(!0, {}, b)))
                    : ((b.state.selected = !1), d.silent || this.$element.trigger("nodeUnselected", a.extend(!0, {}, b))));
        }),
        (g.prototype.toggleCheckedState = function (a, b) {
            a && this.setCheckedState(a, !a.state.checked, b);
        }),
        (g.prototype.setCheckedState = function (b, c, d) {
            c !== b.state.checked && (c ? ((b.state.checked = !0), d.silent || this.$element.trigger("nodeChecked", a.extend(!0, {}, b))) : ((b.state.checked = !1), d.silent || this.$element.trigger("nodeUnchecked", a.extend(!0, {}, b))));
        }),
        (g.prototype.setDisabledState = function (b, c, d) {
            c !== b.state.disabled &&
                (c
                    ? ((b.state.disabled = !0), this.setExpandedState(b, !1, d), this.setSelectedState(b, !1, d), this.setCheckedState(b, !1, d), d.silent || this.$element.trigger("nodeDisabled", a.extend(!0, {}, b)))
                    : ((b.state.disabled = !1), d.silent || this.$element.trigger("nodeEnabled", a.extend(!0, {}, b))));
        }),
        (g.prototype.render = function () {
            this.initialized || (this.$element.addClass(e), (this.$wrapper = a(this.template.list)), this.injectStyle(), (this.initialized = !0)), this.$element.empty().append(this.$wrapper.empty()), this.buildTree(this.tree, 0);
        }),
        (g.prototype.buildTree = function (b, c) {
            if (b) {
                c += 1;
                var d = this;
                a.each(b, function (b, e) {
                    for (
                        var f = a(d.template.item)
                                .addClass("node-" + d.elementId)
                                .addClass(e.state.checked ? "node-checked" : "")
                                .addClass(e.state.disabled ? "node-disabled" : "")
                                .addClass(e.state.selected ? "node-selected" : "")
                                .addClass(e.searchResult ? "search-result" : "")
                                .attr("data-nodeid", e.nodeId)
                                .attr("style", d.buildStyleOverride(e)),
                            g = 0;
                        c - 1 > g;
                        g++
                    )
                        f.append(d.template.indent);
                    var h = [];
                    if ((e.nodes ? (h.push("expand-icon"), h.push(e.state.expanded ? d.options.collapseIcon : d.options.expandIcon)) : h.push(d.options.emptyIcon), f.append(a(d.template.icon).addClass(h.join(" "))), d.options.showIcon)) {
                        var h = ["node-icon"];
                        h.push(e.icon || d.options.nodeIcon), e.state.selected && (h.pop(), h.push(e.selectedIcon || d.options.selectedIcon || e.icon || d.options.nodeIcon)), f.append(a(d.template.icon).addClass(h.join(" ")));
                    }
                    if (d.options.showCheckbox) {
                        var h = ["check-icon"];
                        h.push(e.state.checked ? d.options.checkedIcon : d.options.uncheckedIcon), f.append(a(d.template.icon).addClass(h.join(" ")));
                    }
                    return (
                        f.append(d.options.enableLinks ? a(d.template.link).attr("href", e.href).append(e.text) : e.text),
                        d.options.showTags &&
                            e.tags &&
                            a.each(e.tags, function (b, c) {
                                f.append(a(d.template.badge).append(c));
                            }),
                        d.$wrapper.append(f),
                        e.nodes && e.state.expanded && !e.state.disabled ? d.buildTree(e.nodes, c) : void 0
                    );
                });
            }
        }),
        (g.prototype.buildStyleOverride = function (a) {
            if (a.state.disabled) return "";
            var b = a.color,
                c = a.backColor;
            return (
                this.options.highlightSelected && a.state.selected && (this.options.selectedColor && (b = this.options.selectedColor), this.options.selectedBackColor && (c = this.options.selectedBackColor)),
                this.options.highlightSearchResults &&
                    a.searchResult &&
                    !a.state.disabled &&
                    (this.options.searchResultColor && (b = this.options.searchResultColor), this.options.searchResultBackColor && (c = this.options.searchResultBackColor)),
                "color:" + b + ";background-color:" + c + ";"
            );
        }),
        (g.prototype.injectStyle = function () {
            this.options.injectStyle && !c.getElementById(this.styleId) && a('<style type="text/css" id="' + this.styleId + '"> ' + this.buildStyle() + " </style>").appendTo("head");
        }),
        (g.prototype.buildStyle = function () {
            var a = ".node-" + this.elementId + "{";
            return (
                this.options.color && (a += "color:" + this.options.color + ";"),
                this.options.backColor && (a += "background-color:" + this.options.backColor + ";"),
                this.options.showBorder ? this.options.borderColor && (a += "border:1px solid " + this.options.borderColor + ";") : (a += "border:none;"),
                (a += "}"),
                this.options.onhoverColor && (a += ".node-" + this.elementId + ":not(.node-disabled):hover{background-color:" + this.options.onhoverColor + ";}"),
                this.css + a
            );
        }),
        (g.prototype.template = {
            list: '<ul class="list-group"></ul>',
            item: '<li class="list-group-item"></li>',
            indent: '<span class="indent"></span>',
            icon: '<span class="icon"></span>',
            link: '<a href="#" style="color:inherit;"></a>',
            badge: '<span class="badge"></span>',
        }),
        (g.prototype.css = ".treeview .list-group-item{cursor:pointer}.treeview span.indent{margin-left:10px;margin-right:10px}.treeview span.icon{width:12px;margin-right:5px}.treeview .node-disabled{color:silver;cursor:not-allowed}"),
        (g.prototype.getNode = function (a) {
            return this.nodes[a];
        }),
        (g.prototype.getParent = function (a) {
            var b = this.identifyNode(a);
            return this.nodes[b.parentId];
        }),
        (g.prototype.getSiblings = function (a) {
            var b = this.identifyNode(a),
                c = this.getParent(b),
                d = c ? c.nodes : this.tree;
            return d.filter(function (a) {
                return a.nodeId !== b.nodeId;
            });
        }),
        (g.prototype.getSelected = function () {
            return this.findNodes("true", "g", "state.selected");
        }),
        (g.prototype.getUnselected = function () {
            return this.findNodes("false", "g", "state.selected");
        }),
        (g.prototype.getExpanded = function () {
            return this.findNodes("true", "g", "state.expanded");
        }),
        (g.prototype.getCollapsed = function () {
            return this.findNodes("false", "g", "state.expanded");
        }),
        (g.prototype.getChecked = function () {
            return this.findNodes("true", "g", "state.checked");
        }),
        (g.prototype.getUnchecked = function () {
            return this.findNodes("false", "g", "state.checked");
        }),
        (g.prototype.getDisabled = function () {
            return this.findNodes("true", "g", "state.disabled");
        }),
        (g.prototype.getEnabled = function () {
            return this.findNodes("false", "g", "state.disabled");
        }),
        (g.prototype.selectNode = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.setSelectedState(a, !0, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.unselectNode = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.setSelectedState(a, !1, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.toggleNodeSelected = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.toggleSelectedState(a, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.collapseAll = function (b) {
            var c = this.findNodes("true", "g", "state.expanded");
            this.forEachIdentifier(
                c,
                b,
                a.proxy(function (a, b) {
                    this.setExpandedState(a, !1, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.collapseNode = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.setExpandedState(a, !1, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.expandAll = function (b) {
            if (((b = a.extend({}, f.options, b)), b && b.levels)) this.expandLevels(this.tree, b.levels, b);
            else {
                var c = this.findNodes("false", "g", "state.expanded");
                this.forEachIdentifier(
                    c,
                    b,
                    a.proxy(function (a, b) {
                        this.setExpandedState(a, !0, b);
                    }, this)
                );
            }
            this.render();
        }),
        (g.prototype.expandNode = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.setExpandedState(a, !0, b), a.nodes && b && b.levels && this.expandLevels(a.nodes, b.levels - 1, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.expandLevels = function (b, c, d) {
            (d = a.extend({}, f.options, d)),
                a.each(
                    b,
                    a.proxy(function (a, b) {
                        this.setExpandedState(b, c > 0 ? !0 : !1, d), b.nodes && this.expandLevels(b.nodes, c - 1, d);
                    }, this)
                );
        }),
        (g.prototype.revealNode = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    for (var c = this.getParent(a); c; ) this.setExpandedState(c, !0, b), (c = this.getParent(c));
                }, this)
            ),
                this.render();
        }),
        (g.prototype.toggleNodeExpanded = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.toggleExpandedState(a, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.checkAll = function (b) {
            var c = this.findNodes("false", "g", "state.checked");
            this.forEachIdentifier(
                c,
                b,
                a.proxy(function (a, b) {
                    this.setCheckedState(a, !0, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.checkNode = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.setCheckedState(a, !0, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.uncheckAll = function (b) {
            var c = this.findNodes("true", "g", "state.checked");
            this.forEachIdentifier(
                c,
                b,
                a.proxy(function (a, b) {
                    this.setCheckedState(a, !1, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.uncheckNode = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.setCheckedState(a, !1, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.toggleNodeChecked = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.toggleCheckedState(a, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.disableAll = function (b) {
            var c = this.findNodes("false", "g", "state.disabled");
            this.forEachIdentifier(
                c,
                b,
                a.proxy(function (a, b) {
                    this.setDisabledState(a, !0, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.disableNode = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.setDisabledState(a, !0, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.enableAll = function (b) {
            var c = this.findNodes("true", "g", "state.disabled");
            this.forEachIdentifier(
                c,
                b,
                a.proxy(function (a, b) {
                    this.setDisabledState(a, !1, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.enableNode = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.setDisabledState(a, !1, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.toggleNodeDisabled = function (b, c) {
            this.forEachIdentifier(
                b,
                c,
                a.proxy(function (a, b) {
                    this.setDisabledState(a, !a.state.disabled, b);
                }, this)
            ),
                this.render();
        }),
        (g.prototype.forEachIdentifier = function (b, c, d) {
            (c = a.extend({}, f.options, c)),
                b instanceof Array || (b = [b]),
                a.each(
                    b,
                    a.proxy(function (a, b) {
                        d(this.identifyNode(b), c);
                    }, this)
                );
        }),
        (g.prototype.identifyNode = function (a) {
            return "number" == typeof a ? this.nodes[a] : a;
        }),
        (g.prototype.search = function (b, c) {
            (c = a.extend({}, f.searchOptions, c)), this.clearSearch({ render: !1 });
            var d = [];
            if (b && b.length > 0) {
                c.exactMatch && (b = "^" + b + "$");
                var e = "g";
                c.ignoreCase && (e += "i"),
                    (d = this.findNodes(b, e)),
                    a.each(d, function (a, b) {
                        b.searchResult = !0;
                    });
            }
            return c.revealResults ? this.revealNode(d) : this.render(), this.$element.trigger("searchComplete", a.extend(!0, {}, d)), d;
        }),
        (g.prototype.clearSearch = function (b) {
            b = a.extend({}, { render: !0 }, b);
            var c = a.each(this.findNodes("true", "g", "searchResult"), function (a, b) {
                b.searchResult = !1;
            });
            b.render && this.render(), this.$element.trigger("searchCleared", a.extend(!0, {}, c));
        }),
        (g.prototype.findNodes = function (b, c, d) {
            (c = c || "g"), (d = d || "text");
            var e = this;
            return a.grep(this.nodes, function (a) {
                var f = e.getNodeValue(a, d);
                return "string" == typeof f ? f.match(new RegExp(b, c)) : void 0;
            });
        }),
        (g.prototype.getNodeValue = function (a, b) {
            var c = b.indexOf(".");
            if (c > 0) {
                var e = a[b.substring(0, c)],
                    f = b.substring(c + 1, b.length);
                return this.getNodeValue(e, f);
            }
            return a.hasOwnProperty(b) ? a[b].toString() : d;
        });
    var h = function (a) {
        b.console && b.console.error(a);
    };
    a.fn[e] = function (b, c) {
        var d;
        return (
            this.each(function () {
                var f = a.data(this, e);
                "string" == typeof b
                    ? f
                        ? a.isFunction(f[b]) && "_" !== b.charAt(0)
                            ? (c instanceof Array || (c = [c]), (d = f[b].apply(f, c)))
                            : h("No such method : " + b)
                        : h("Not initialized, can not call method : " + b)
                    : "boolean" == typeof b
                    ? (d = f)
                    : a.data(this, e, new g(this, a.extend(!0, {}, b)));
            }),
            d || this
        );
    };
})(jQuery, window, document);
