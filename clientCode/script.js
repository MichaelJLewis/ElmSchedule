$(function(){
    
    //Login
    
    $("#btnLogin").click(function(){
        var username = $("#txtUsername").val();
        var password = $("#txtPassword").val();
        
        $.ajax({
            url: "serverCode/_login.php",
            type: "POST",
            data: {
                    username: username,
                    password: password
                  },
            success: function(data){
                if(data.length != 0){
                    $("#loginError").html(data);
                }else{
                    $("form").submit();
                }
                
            }
        });
    });
    
    //Register
    
    $("#btnRegister").click(function(){
        var error = "";
        
        var emailExp = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
        
        if($("#txtPassword").val() != $("#txtConfirmPassword").val())
        {
            error += "* Passwords Don't Match.<br>";
        }
        
        if(!($("#txtPassword").val().length > 1))
        {
            error += "* Password is Required.<br>";
        }
        
        if($("#txtUsername").val().length < 1)
        {
            error += "* Invalid User Name<br>";
        }
        
        if($("#txtFirst").val().length < 1)
        {
            error += "* First Name is Required<br>";
        }
        
        if($("#txtLast").val().length < 1)
        {
            error += "* Last Name is Required<br>";
        }
        
        if($("#txtEmail").val().length < 1 || !emailExp.test($("#txtEmail").val()))
        {
            error += "* Invalid Email<br>";
        }
        
        $.ajax({
            url: "serverCode/_checkUniqueUser.php",
            type: "GET",
            data: "username="+$("#txtUsername").val(),
            success: function(data){
                if(data.length != 0){
                    error += "* Username is taken<br>"; 
                }
                
                if(error == ""){
                    $("form").submit();
                }else{
                    $("#error").html(error); 
                }
            }
        });  
    });
    
    //Main
    
    $("#weekSchedule").ready(function(){
        $.ajax({
            url: "serverCode/_loadWeekSchedule.php",
            success: function(data){
                
            }
        });  
    });
    
    //Admin Schedule
    
    if ($("#scheduleContainer").length > 0){
        $("#secDrop").ready(function(){
            $.ajax({
                url: "serverCode/_grabAllSections.php",
                success: function(data){
                    var sections = JSON.parse(data);
                    for(i = 0; i<sections["value"].length; i++){
                        $('#secDrop').append($('<option>', {
                            value:  sections["value"][i],
                            text:   sections["text"][i]
                        }));
                    }

                }
            });  
        });



        $("#secDrop").change(function(){
            $.ajax({
                type: "POST",
                url: "serverCode/_grabUsers.php",
                data: {secID: $("#secDrop").val()},
                success: function(data){

                    $(".userDrop").children().remove();

                    var users = JSON.parse(data);

                    for(i = 0; i<users["value"].length; i++){
                        $('.userDrop').append($('<option>', {
                            value:  users["value"][i],
                            text:   users["text"][i]
                        }));
                    }
                }
            });  
        });
    }
    
    //Employee.php
    
    if($("#employeeContainer").length > 0){
        
        $("#employeeContainer").ready(function(){
            $.ajax({
                url: "serverCode/_grabEmployees.php",
                success: function(data){
                    $("#employeeContainer").html(data);
                }
            });
            $("#divEditSec").toggle();
            $("#divAddSection").toggle();
            $("#divBrowseCsv").toggle();
        });
        
        $("#btnAddEmployee").click(function(){
            $("#btnAddEmployee").prev().submit();
        });
        
        var openSectionToggle = true;
        
        $("#btnOpenSection").click(function(){
            
            if(openSectionToggle){
                $.ajax({
                    type: "POST",
                    url: "serverCode/_grabUsers.php",
                    data: {secID: "1"},
                    success: function(data){
                        
                        $(".userDrop").children().remove();

                        var users = JSON.parse(data);

                        $('.userDrop').append($('<option>', {
                                value:  0,
                                text:   "Select a Manager..."
                            }));

                        for(i = 0; i<users["value"].length; i++){
                            $('.userDrop').append($('<option>', {
                                value:  users["value"][i],
                                text:   users["text"][i]
                            }));
                        }
                        
                        $("#divAddSection").slideToggle("fast");
                        openSectionToggle = false;

                    }
                });
            }else{
                $("#divAddSection").slideToggle("fast");
                openSectionToggle = true;
            }
            
            
        });
        
        $("#btnAddSection").click(function(){
            var txtSection = $("#txtSection").val();
            var manager = $(".userDrop").val();
            
            if(txtSection.length > 0){
                $.ajax({
                    type: "POST",
                    url: "serverCode/_addSection.php",
                    data: { secName: txtSection,
                            secMan:  manager
                          },
                    success: function(data){
                       location.reload();
                    }
                });
            }
        });
        
        var editSectionToggle = true;
        
        $("#btnEditSection").click(function(){
            
            
            if(editSectionToggle){
                $.ajax({
                    type: "POST",
                    url: "serverCode/_grabAllSections.php",
                    success: function(data){
                        
                    var sections = JSON.parse(data);
                        
                    var html = "";

                    for(i = 0; i<sections["value"].length; i++){
                        html += "<div class='sectionOpts'><input type='text' value='"+sections["text"][i]+"'><input type='hidden' value='"+sections["value"][i]+"'><input type='button' class='updateSection' value='Update'><img class='deleteSection'src='images/delete.png'></div>";
                    }
                        
                        html += "<script>$('.deleteSection').click(function(){var secID = $(this).prev().prev().val();var error = '';if(secID == '1'){error += 'Cannot Delete Admin Section';}else{$.ajax({type: 'POST',url: 'serverCode/_deleteSection.php',data:{secID: secID},success:function(data){location.reload();}});}if(error.length>0){$('#error').html(error);error='';}});$('.updateSection').click(function(){var secID=$(this).prev().val();var secName=$(this).prev().prev().val();$.ajax({type:'POST',url:'serverCode/_updateSection.php',data:{secID: secID,secName: secName},success:function(data){location.reload();}});});</script>";
                        
                        $("#divEditSec").html(html);
                        $("#divEditSec").slideToggle("fast");
                        editSectionToggle = false;
                    }
                });
            }else{
                $("#divEditSec").slideToggle("fast");
                editSectionToggle = true;
            }
        });
        
        var batch = true;
        
        $("#btnBatchAddEmployee").click(function(){
            if(batch){
                $("#divBrowseCsv").slideToggle();
                batch = false;
            }else{
                $("#divBrowseCsv").slideToggle();
                batch = true;
            }
        });
            
        $("#btnSubmitBatch").click(function(){
            if($("#fileCSV").val() == ""){
                error += "Please provide a CSV file";
            }else{
                $("#btnSubmitBatch").prev().submit();
            }
        });
        
        
    }
    
    //AddEmployee.php
    
    if($("#dropProvider").length > 0){
        
        var carrier = [];
        
        carrier["value"] = ["bellmobility.ca", "fido.ca", "vmobile.ca", "msg.telus.com", "pcs.rogers.com"];
        
        carrier["text"] = ["Bell Canada", "Fido", "Virgin Mobile (Canada)", "Telus", "Rogers"];
        
        
        $("#dropProvider").ready(function(){
            for(i = 0; i<carrier["value"].length; i++){
                $('#dropProvider').append($('<option>', {
                    value:  carrier["value"][i],
                    text:   carrier["text"][i]
                }));
            }
        });
        
        $("#secDrop").ready(function(){
            
            $.ajax({
                url: "serverCode/_grabAllSections.php",
                success: function(data){
                    var sections = JSON.parse(data);
                    for(i = 0; i<sections["value"].length; i++){
                        $('#secDrop').append($('<option>', {
                            value:  sections["value"][i],
                            text:   sections["text"][i]
                        }));
                     
                    }
                }
            });  
        });
        
        
        $("#btnSubmitEmployee").click(function(){
             var error = "";
        
            var emailExp = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);

            if($("#txtFirst").val().length < 1)
            {
                error += "* First Name is Required<br>";
            }

            if($("#txtLast").val().length < 1)
            {
                error += "* Last Name is Required<br>";
            }

            if($("#txtEmail").val().length < 1 || !emailExp.test($("#txtEmail").val()))
            {
                error += "* Invalid Email<br>";
            }
            
            if(error == ""){
                $("form").submit();
            }else{
                $("#error").html(error); 
            }
        });
        
    }
    
    
    
});