$.validator.addMethod("validateImage", function (value, element) {
    var regexp = /\.(gif|jpeg|jpg|png)$/i;
    return this.optional(element) || regexp.test(value);
}, "Định dạng ảnh không hợp lệ");