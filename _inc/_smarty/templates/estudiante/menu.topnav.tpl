<div class="wrapper row2">
  <div class="rnd">
    <div id="topnav">
      <ul>
        <li><a href="{$URL}">Inicio</a></li>
        {if (isset($menuList))}
          {foreach from=$menuList key=myId item=i name=foo} 
          <li {if $smarty.foreach.foo.last}class="active"{/if} ><a href="{$i.url}">{$i.name}</a></li>
          {/foreach}
        {/if}
      </ul>
    </div>
  </div>
</div>