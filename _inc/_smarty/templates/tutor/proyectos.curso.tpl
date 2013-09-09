{include file="../tutor/headerTutor.tpl"}
<div class="wrapper row2">
    <div class="rnd">
        <div>
            <h1 class="titulos"><p align="center"> PROYECTOS EN CURSO </p></h1>
            <table class="tablaFormulario tbl_lista">
                <thead>
                    <tr>
                        <th>Nombre Estudiante</th>
                        <th>Nombre Proyecto</th>
                        <th>Modalidad</th>
                        <th>Area</th>
                        <th>Sub-area</th>
                        <th>Historial</th>
                    </tr>
                </thead>
                
                   <tbody>
                    
                    
                    
                {section name=ic loop=$objs}
                    <tr class="{cycle values="light,dark"}">
                        <td>{$objs[ic]->nombre} {$objs[ic]->apellidos}</td>
                        <td>{$objs[ic]->nombreproyecto}</td>
                        <td>{$objs[ic]->modalidad}</td>
                        <td>{$objs[ic]->nombrearea}</td>
                        <td>{$objs[ic]->nombresub}</td>
                        
                        <td><li><a href="{$URL}tutor/MuestraHistorial.php">ver</a></li><td>
                                      
                  
                    </tr>
                {/section}
                
                
           
                </tbody>
            </table>
        </div>
    </div>
</div>
{include file="footer.tpl"}
