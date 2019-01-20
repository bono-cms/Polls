/**
 * Polls UI handler for the site
 */
(function($){
    $(function(){
        // Shared references
        var $wrapper = $(".polls-wrapper");

        $wrapper.each(function(){
            var $self = $(this);
            var $form = $self.find("form[data-type='polls']");

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
                        $self.empty().append(response);
                    }
                });
            });

            // A handler for "View results" button
            $form.find("button[type='results']").click(function(event){
                event.preventDefault();

                // Get the URL from the target
                var url = $(this).attr('data-url');

                // Send the request
                $.ajax({
                    url: url,
                    cache: true,
                    success: function(response){
                        // Remove all child elements
                        $self.empty().append(response);
                    }
                });
            });
        });
    });

})(jQuery);
