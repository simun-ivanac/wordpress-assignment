(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/@babel/runtime/helpers/classCallCheck.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/classCallCheck.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

module.exports = _classCallCheck;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/createClass.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/createClass.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

module.exports = _createClass;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./src/Blocks/components/drawer/assets/drawer.js":
/*!*******************************************************!*\
  !*** ./src/Blocks/components/drawer/assets/drawer.js ***!
  \*******************************************************/
/*! exports provided: Drawer */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Drawer", function() { return Drawer; });
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);


var Drawer = /*#__PURE__*/function () {
  function Drawer() {
    var selector = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.js-drawer';
    var CLASS_IS_OPEN = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'menu-is-open';
    var CLASS_OVERLAY_IS_SHOWING = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'page-overlay-shown';
    var CLASS_NO_SCROLL = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 'u-no-scroll';

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, Drawer);

    this.CLASS_IS_OPEN = CLASS_IS_OPEN;
    this.CLASS_OVERLAY_IS_SHOWING = CLASS_OVERLAY_IS_SHOWING;
    this.CLASS_NO_SCROLL = CLASS_NO_SCROLL;
    this.drawer = document.querySelector(selector);
    this.trigger = document.querySelector(".".concat(this.drawer.getAttribute('data-trigger')));
    this.overlay = null; // Set overlay only if there is one to select.

    if (this.drawer.getAttribute('data-overlay')) {
      this.overlay = document.querySelector(".".concat(this.drawer.getAttribute('data-overlay')));
    }
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(Drawer, [{
    key: "preventScroll",
    value: function preventScroll() {
      document.body.style.top = "-".concat(window.scrollY, "px");
      document.body.classList.add(this.CLASS_NO_SCROLL);
    }
  }, {
    key: "enableScroll",
    value: function enableScroll() {
      var scrollY = document.body.style.top;
      document.body.classList.remove(this.CLASS_NO_SCROLL);
      document.body.style.top = '';
      window.scrollTo(0, parseInt(scrollY || '0', 10) * -1);
    }
  }, {
    key: "openMobileMenu",
    value: function openMobileMenu() {
      if (this.overlay) {
        document.body.classList.add(this.CLASS_OVERLAY_IS_SHOWING);
      }

      document.body.classList.add(this.CLASS_IS_OPEN);
      this.preventScroll();
    }
  }, {
    key: "closeMobileMenu",
    value: function closeMobileMenu() {
      if (this.overlay) {
        document.body.classList.remove(this.CLASS_OVERLAY_IS_SHOWING);
      }

      document.body.classList.remove(this.CLASS_IS_OPEN);
      this.enableScroll();
    }
  }, {
    key: "closeMobileMenuOnOverlayClick",
    value: function closeMobileMenuOnOverlayClick() {
      var _this = this;

      if (this.overlay) {
        this.overlay.addEventListener('click', function () {
          _this.closeMobileMenu();
        });
      }
    }
  }, {
    key: "drawerInit",
    value: function drawerInit() {
      var _this2 = this;

      this.trigger.addEventListener('click', function () {
        if (document.body.classList.contains(_this2.CLASS_IS_OPEN)) {
          _this2.closeMobileMenu();
        } else {
          _this2.openMobileMenu();
        }
      });
      this.closeMobileMenuOnOverlayClick();
    }
  }]);

  return Drawer;
}();

/***/ })

}]);