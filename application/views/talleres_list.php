<table id="example" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Estado</th>
            <th>Ciudad</th>
            <th>Municipio</th>
            <th>Telefonos</th>                    
            <th>E-mail</th>
        </tr>
    </thead>

    <tbody>        
        <?php
            foreach ($talleres as $taller) {
                echo "<tr>";
                echo "<td>".$taller['NOMBRE']."</td>";
                echo "<td>".$taller['DIRECCION']."</td>";
                echo "<td>".$taller['ESTADO']."</td>";
                echo "<td>".$taller['CIUDAD']."</td>";
                echo "<td>".$taller['MUNICIPIO']."</td>";
                echo "<td>".$taller['TELEFONO1']."</td>";
                echo "<td><a href=\"mailto:".$taller['EMAIL']."\">".$taller['EMAIL']."</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>