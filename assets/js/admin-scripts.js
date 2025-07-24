jQuery(document).ready(function($) {
  $('#upload_plan_image').on('click', function(e) {
    e.preventDefault();

    const customUploader = wp.media({
      title: 'Seleccionar imagen',
      button: {
        text: 'Usar esta imagen'
      },
      multiple: false
    });

    customUploader.on('select', function() {
      const attachment = customUploader.state().get('selection').first().toJSON();
      $('#plan_image_id').val(attachment.id);
      $('#plan-image-preview').attr('src', attachment.url);
    });

    customUploader.open();
  });

  $('#upload_invert_image').on('click', function(e) {
    e.preventDefault();

    const customUploader = wp.media({
      title: 'Seleccionar imagen',
      button: {
        text: 'Usar esta imagen'
      },
      multiple: false
    });

    customUploader.on('select', function() {
      const attachment = customUploader.state().get('selection').first().toJSON();
      $('#invert_image_id').val(attachment.id);
      $('#invert-image-preview').attr('src', attachment.url);
    });

    customUploader.open();
  });
});