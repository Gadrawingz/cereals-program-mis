let districts = {
      'East' : ['Bugesera', 'Gatsibo', 'Kayonza', 'Kirehe', 'Ngoma', 'Nyagatare', 'Rwamagana'],
      'West' : ['Karongi', 'Ngororero', 'Nyabihu', 'Nyamasheke', 'Rubavu', 'Rusizi', 'Rutsiro'],
      'North' : ['Burera', 'Gakenke', 'Gicumbi', 'Musanze', 'Rulindo'],
      'South' : ['Gisagara', 'Huye', 'Kamonyi', 'Muhanga', 'Nyamagabe', 'Nyanza', 'Nyaruguru', 'Ruhango'],
      'Kigali City' : ['Kicukiro', 'Gasabo', 'Nyarugenge']
    };

    // When an option is changed, search the above for matching choices
    $('#province').on('change', function() {
      let selectValue = $(this).val();
      
      // Empty the 2nd field
      $('#district').empty();

      // For each chocie in the selected option
      for(i = 0; i < districts[selectValue].length; i++){
        // Output choice in the target field
        $('#district').append("<option value='"+districts[selectValue][i]+"'>"+districts[selectValue][i]+"</option>");
    }
  }); 
