<div class="clear"></div>
<div  id="pagination_up" >{include file="estudiante/pagination.tpl"}</div>
<div class="clear"></div>
{include file=$lista}
<script type="text/javascript">
  {literal}
    $(document).ready(function() {
      $("#filtro_clear").submit(function(event) {
        $('#filtro').each(function(){
          this.reset();
        });
        event.preventDefault(); 
        var $form = $( this ),
        url       = $form.attr( 'action' );
        var sdata = $form.serialize();
        $('#tlista').load(url + '?clear=Limpiar&tlista=1', function(response, status, xhr) {
          $('#tlista').hide().fadeIn();
          if (status == "error") {
            var msg = "Sorry but there was an error: ";
            $("#error").html(msg + xhr.status + " " + xhr.statusText);
          }
        });
      });
      $("#filtro").submit(function(event) {
        event.preventDefault(); 
        var $form = $( this ),
        url       = $form.attr( 'action' );
        var sdata = $form.serialize();
        $('#tlista').load(url + '?' + sdata + '&tlista=1', function(response, status, xhr) {
          $('#tlista').hide().fadeIn();
          if (status == "error") {
            var msg = "Sorry but there was an error: ";
            $("#error").html(msg + xhr.status + " " + xhr.statusText);
          }
        });
      });
      $('.tajax').click(function() {
        $('#tlista').load($(this).attr('href') + '&tlista=1', function(response, status, xhr) {
          $('#tlista').hide().fadeIn();
          if (status == "error") {
            var msg = "Sorry but there was an error: ";
            $("#error").html(msg + xhr.status + " " + xhr.statusText);
          }
        });
        return false;
      });
    });
  {/literal}
</script>
<div class="clear"></div>
<div  id="pagination_down" >{include file="estudiante/pagination.tpl"}</div>
<div class="clear"></div>