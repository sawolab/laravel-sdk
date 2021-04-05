<div id="sawo-container"></div>
<script src="https://websdk.sawolabs.com/sawo.min.js"></script>
<script type="text/javascript">
    function redirectPost(data) {
        var form = document.createElement('form');
        document.body.appendChild(form);
        form.method = 'post';
        form.action = "{{ Config::get('sawo.redirect_url') }}";
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = '_token';
        input.value = "{{ csrf_token() }}";
        form.appendChild(input);
        for (let name in data) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = data[name];
            form.appendChild(input);
        }
        form.submit();
    }

    var config = {
        // should be same as the id of the container created on 3rd step
        containerID: "sawo-container",
        // can be one of 'email' or 'phone_number_sms'
        identifierType: "{{ Config::get('sawo.identifier_type') }}",
        // Add the Secret key copied from 2nd step
        secretKey: "{{ Config::get('sawo.api_secret_key') }}",
        // Add the API key copied from 2nd step
        apiKey: "{{ Config::get('sawo.api_key') }}",
        // Add a callback here to handle the payload sent by sdk
        onSuccess: (payload) => {
            // console.log(payload);
            redirectPost(payload);
        },
    };
    var sawo = new Sawo(config);
    sawo.showForm();
</script>
