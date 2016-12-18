/**
 * Polls UI handler for the site
 */
$(function(){
    // Shared refereces
    var $wrapper = $(".polls-wrapper");
    var $form = $wrapper.find("form[data-type='polls']");

    // Attach click listener for radio inputs. When one is clicked, enable the submission button
    $form.find("input[type='radio']").click(function(){
        // Enable the button
        $form.find("button[type='submit']").prop('disabled', false);
    });

    // Override default form submission
    $form.submit(function(event){
        event.preventDefault();

        // Collect form variables
        var action = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();

        // Send the request
        $.ajax({
            type: method,
            url: action,
            data: data,
            success: function(response){
                // Remove all child elements
                $wrapper.empty().append(response);
            }
        });
    });
});
