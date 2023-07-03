var pluginNameInput = document.getElementById("pluginName");

pluginNameInput.addEventListener("input", function () {
    var pluginName = this.value;
    var regex = /^[a-z0-9-]+$/i;

    if (!regex.test(pluginName)) {
        this.setCustomValidity("Enter a valid plugin name without spaces or symbols. Only lowercase letters (a-z), digits (0-9), or hyphens (-) are allowed.");
    } else {
        this.setCustomValidity("");
    }

    this.reportValidity();

});

var pluginSlugInput = document.getElementById('pluginSlug');

pluginSlugInput.addEventListener('input', function () {
    var pluginSlugValue = this.value;
    var regex = /^[a-z0-9]+(?:-[a-z0-9]+)*$/;

    if (!regex.test(pluginSlugValue)) {
        this.setCustomValidity('Plugin Slug should be all lowercase without spaces or symbols (except hyphens)');
    } else {
        this.setCustomValidity('');
    }
    
    this.reportValidity();
    
});


