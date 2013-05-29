
{include file="header.tpl"}

<select id='searchable' multiple='multiple'>
  <option value='fr'>France</option>
  <option value='uk'>United Kingdom</option>
  <option value='us'>United States</option>
  <option value='ch'>China</option>
</select>
<script src="path/to/jquery.multi-select.js" type="text/javascript"></script>
<script src="path/to/jquery.quicksearch.js" type="text/javascript"></script>
<script>
    $('#searchable').multiSelect({
  selectableHeader: "<input type='text' id='search' autocomplete='off' placeholder='try \"elem 2\"'>"
});

$('#search').quicksearch($('.ms-elem-selectable', '#ms-searchable' )).on('keydown', function(e){
  if (e.keyCode == 40){
    $(this).trigger('focusout');
    $('#searchable').focus();
    return false;
  }
});
</script>



{include file="footer.tpl"}