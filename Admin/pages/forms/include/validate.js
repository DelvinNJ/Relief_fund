$(function() {

  $.validator.setDefaults({
    errorClass: 'help-block text-danger',
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

$("#emgcategoryform").validate({

    rules: {
      category: {
        required: true,
        minlength: 3,
      }

     
    },
    messages: {
      
      category: {
        required: 'Please Enter The Category Name',
      },  
     
    }
  });


$("#emgsubcategory").validate({

    rules: {
      category: {
        required: true,
      },
      subcategory: {
        required: true,
        minlength: 3,
      },
      amount: {
        required: true,
        minlength: 3,
        digits: true,
      },
      description: {
        required: true,
        minlength: 3,
      },
      date: {
        required: true,
        minlength: 3,
      },
      image1: {
        required: true,
        minlength: 3,
      },




    },
    messages: {
      
      category: {
        required: 'Please Choose Category Name',
      },  
      subcategory: {
        required: 'Please Enter The Subcategory Name',
      },
      amount: {
        required: 'Please Enter The Amount',
      },    
      description: {
        required: 'Please Enter Description',
      },  
      date: {
        required: 'Please Enter Date',
      },
      image1: {
        required: 'Please Select Atleast One Image',
      },  

         
    }
  });




  });