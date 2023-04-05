<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N"
            crossorigin="anonymous"
        />

        <title>Chat GPT 4</title>
    </head>
    <body>
        <h1></h1>

        <div class="container">
            <div class="row">
                <div class="col-md-12>
                    
                    <div class="card">
                        <h4 align="center">Ask your question</h4>
                        <div class="card-header" style="background-color:#d5d5d5; color:#000;">
                            FlyingSpark! How can I help you today?
                        </div>
                        <div class="card-body" id="chat-box" style="background-color:#f7f7f7">
                            <!-- Chat messages will be appended here -->
                        </div>
                        <div class="card-footer">
                            <form id="chat-form" action="" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="text" id="message" name="message" placeholder="Type your Message Here" required class="form-control">
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-primary" id="send-btn">
                                                Send
                                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
        
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    -->
    <script>
        $(document).ready(function() {
            var sendButton = $('#send-btn');
        
            $('#chat-form').on('submit', function(event) {
                event.preventDefault();
                var message = $('#message').val();
        
                // Disable the send button and show the loading icon
                sendButton.prop('disabled', true);
                sendButton.find('.spinner-border').removeClass('d-none');
        
                $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

                $.ajax({
                    type: 'POST',
                    url: '{{ route('chatgpt') }}',
                    data: {message: message},
                    
                    success: function(response) {
                        var chatBox = $('#chat-box');
                        var messageHtml = '<div class="message"><strong>You:</strong> ' + message + '</div>';
                        var responseHtml = '<div class="message" style="background-color:#fff;padding:10px;"><strong style="color:#fff; background-color:#0d6efd;padding:2px;">FlyingSpark:</strong> ' + response.message + '</div>';
                        chatBox.append(messageHtml);
                        chatBox.append(responseHtml);
                        $('#message').val('');
        
                        // Enable the send button and hide the loading icon
                        sendButton.prop('disabled', false);
                        sendButton.find('.spinner-border').addClass('d-none');
                    },
                    error: function() {
                        // Enable the send button and hide the loading icon on error
                        sendButton.prop('disabled', false);
                        sendButton.find('.spinner-border').addClass('d-none');
                    }
                });
            });
        });
        </script>
</body>
</html>
