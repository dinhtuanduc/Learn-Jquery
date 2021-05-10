$.validator.addMethod("validateEmail", function (value, element) {
    var regexp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    return this.optional(element) || regexp.test(value);
}, "Định dạng email không hợp lệ");