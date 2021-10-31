  
$(function() {

  $.validator.setDefaults({
    errorClass: 'help-block',
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    },
    errorPlacement: function (error, element) {
      if (element.prop('type') === 'checkbox') {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    }
  });






$("#applicationform").validate({

    rules: {
      category: {
        required: true,
      },
      subcategory: {
        required: true,
        minlength:3,
      },
      amount: {
        required: true,
        maxlength:7,
      },
      datehappened:{
        required:true,
      },
      description:{
        required:true,
        minlength:10,
        maxlength:250,

      },

      doc1: {
            required: true,
        },

      selfdeclaration:{
        required:true,
      },

      incomecertificate:{
        required:true,
      },

      ration:{
        required:true,
      },

     
    },
    messages: {
      
      category: {
        required: 'Please Choose The Category',
      },
      subcategory: {
        required: 'Please Enter Sub Category Name',
       
      },
      amount:{
        required:"Please Enter Amount"
      },
      datehappened:{
        required:"Please Enter Date"
      },
       description:{
        required:"Please Choose an Image"
      },
      doc1:{
        required:"Please Choose an Image"
      },
      selfdeclaration:{
        required:"Please Choose a File"
      },
      incomecertificate:{
        required:"Please Choose a File"
      },
      ration:{
        required:"Please Choose a File"
      },
    }
  });




$("#vform").validate({

    rules: {
      status: {
        required: true,
      },
      fname: {
        required: true,
        minlength:3,
      },
      lname: {
        required: true,
      },
      email:{
      	required:true,
      	emailvalidate:true,
      },
      phone:{
      	required:true,
      	minlength:10,
        digits:true,

      },
      password:{
      	required:true,
      	passwordvalidate:true,
      },
      cpassword: {
            required: true,
            equalTo: "#password"
        },



      aadhaar:{
      	required:true,
      	maxlength:12,
      	minlength:12,
      },



      pancard:{
      	required:true,
      	minlength:10,
      	maxlength:10,
      	pancardvalidate:true,
      }

     
    },
    messages: {
      
      status: {
        required: 'Please Choose The Type Of User',
      },
      fname: {
        required: 'Please Enter First Name',
       
      },
      lname:{
      	required:"Please Enter Last Name"
      },
      email:{
      	required:"Please Enter Email Address"
      },
      password:{
      	required:"Please Enter Password"
      },
      cpassword:{
      	required:"Please Verify Your Password"
      },
      pancard:{
      	required:"Please Enter Pancard Number"
      }
    }
  });


jQuery.validator.addMethod("emailvalidate", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-z0-9]+[\._]?[a-z0-9]+[@]\w+[.]\w{2,3}$/.test( value );
}, 'Please Enter Valid Email Address.');







jQuery.validator.addMethod("passwordvalidate", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/.test( value );
}, 'Password is too weak or common to use.');








jQuery.validator.addMethod("pancardvalidate", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^([A-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/.test( value );
}, 'Please Enter Valid Pancard Number.');
















$("#bankform").validate({
    rules: {
      accnum: {
        required: true,
        // minlength:3,
      },
      c_accnum: {
        required: true,
        equalTo: "#accnum",
      },
      ifsc:{
        required:true,
        // emailvalidate:true,
      },
      c_ifsc:{
        required:true,
        equalTo: "#ifsc"
      },
      bank:{
        required:true,
        // passwordvalidate:true,
      },
      

      passbook:{
        required:true,
      },


     
    },
    messages: {
      accnum: {
        required: 'Please Enter First Name',
       
      },
      c_accnum:{
        required:"Please Enter Last Name"
      },
      ifsc:{
        required:"Please Enter IFSC Code"
      },
      c_ifsc:{
        required:"Please Verify IFSC Code"
      },
      bank:{
        required:"Please Enter The Bank Details"
      },
      passbook:{
        required:"Please Upload File"
      }
    }
  });






  });