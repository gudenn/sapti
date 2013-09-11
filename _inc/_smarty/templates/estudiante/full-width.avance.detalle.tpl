{include file="estudiante/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
        <h1 class="title">Detalle de Avance</h1>
        
{literal}

<!-- The file upload form used as target for the file upload widget -->
<form id="fileupload" action="archivo" method="POST" enctype="multipart/form-data">
    <!-- The table listing the files available for upload/download -->
    <h3><b>Archivos</b></h3>
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
        <p>
          {$avance->getDescripcion()}
        </p>
        
        <hr>
    {$ERROR}
    </div>
  </div>
</div>
{include file="footer.tpl"}