$.validator.addMethod( "validatePhone", function( phone_number, element ) {
    phone_number = phone_number.replace( /\s+/g, "" );
    var regexp = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    return this.optional( element ) || regexp.test( phone_number );
}, "Số điện thoại không hợp lệ" );