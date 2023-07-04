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


