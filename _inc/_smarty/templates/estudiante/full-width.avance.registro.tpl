{include file="estudiante/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
        <h1 class="title">Registro de Avance</h1>
        
{literal}

<!-- The file upload form used as target for the file upload widget -->
<form id="fileupload" action="archivo" method="POST" enctype="multipart/form-data">
    <!-- Redirect browsers with JavaScript disabled to the origin page -->
    <noscript><input type="hidden" name="redirect" value="<?php echo URL ?>"></noscript>
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <div class="fileupload-buttonbar">
        <div class="fileupload-buttons">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="fileinput-button">
                <span>Add files...</span>
                <input type="file" name="files[]" multiple>
            </span>
            <button type="submit" class="start">Subir Archivos</button>
            <button type="reset" class="cancel">Cancelar</button>
            <button type="button" class="delete">Borrar</button>
            <input type="checkbox" class="toggle">
            <!-- The loading indicator is shown during file processing -->
            <span class="fileupload-loading"></span>
        </div>
        <!-- The global progress information -->
        <div class="fileupload-progress fade" style="display:none">
            <!-- The global progress bar -->
            <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            <!-- The extended global progress information -->
            <div class="progress-extended">&nbsp;</div>
        </div>
    </div>
    <!-- The table listing the files available for upload/download -->
    <table role="presentation"><tbody class="files"></tbody></table>
</form>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade" style="display:none">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            {% if (file.error) { %}
                <div><span class="error">Error:</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <p class="size">{%=o.formatFileSize(file.size)%}</p>
            {% if (!o.files.error) { %}
                <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"></div>
            {% } %}
        </td>
        <td>
            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
                <button class="start">Subir</button>
            {% } %}
            {% if (!i) { %}
                <button class="cancel">Cancelar</button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade" style="display:none">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
            </p>
            {% if (file.error) { %}
                <div><span class="error">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            <button class="delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Borrar</button>
            <input type="checkbox" name="delete" value="1" class="toggle">
        </td>
    </tr>
{% } %}
</script>
{/literal}
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="{$URL_JS}jQfu/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="{$URL_JS}jQfu/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="{$URL_JS}jQfu/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="{$URL_JS}jQfu/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{$URL_JS}jQfu/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="{$URL_JS}jQfu/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="{$URL_JS}jQfu/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="{$URL_JS}jQfu/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="{$URL_JS}jQfu/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="{$URL_JS}jQfu/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="{$URL_JS}jQfu/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="{$URL_JS}jQfu/js/jquery.fileupload-ui.js"></script>
<!-- The File Upload jQuery UI plugin -->
<script src="{$URL_JS}jQfu/js/jquery.fileupload-jquery-ui.js"></script>
<!-- The main application script -->
<script src="{$URL_JS}jQfu/js/main.js"></script>
{literal}
<script>
// Initialize the jQuery UI theme switcher:
$('#theme-switcher').change(function () {
    var theme = $('#theme');
    theme.prop(
        'href',
        theme.prop('href').replace(
            /[\w\-]+\/jquery-ui.css/,
            $(this).val() + '/jquery-ui.css'
        )
    );
});
</script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
{/literal}
        
        <h3><b>Descripcion</b></h3>
        
        <form action="" method="post" id="registro" name="registro" >
          <p>
            <textarea name="descripcion" id="descripcion" rows="4" cols="60" style="width: 431px;height: 305px;" data-validation-engine="validate[required]">{$avance->descripcion}</textarea>
          </p>
          <script>
            CKEDITOR.replace('descripcion');
          </script>
          <input type="hidden" name="id"            value="{$avance->id}">
          <input type="hidden" name="directorio"    value="{$avance->directorio}">
          <input type="hidden" name="tarea" value="registrar_avance">
          <input type="hidden" name="token" value="{$token}">
          <button type="submit" class="delete ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button" aria-disabled="false"><span class="ui-button-icon-primary ui-icon ui-icon-disk"></span><span class="ui-button-text">Grabar</span></button>
          
        </form>
        <hr>
    {$ERROR}
    </div>
  </div>
</div>
{include file="footer.tpl"}