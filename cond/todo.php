<?php
// error_reporting (E_ALL ^ E_NOTICE);
    $cargos=[
        1 => 'DESPACHADOR',2 => 'MONITOR',3 => 'SUPERVISOR DE APROVECHAMIENTO',4 => 'INSPECTOR DE EQUIPOS',
        5 => 'JEFE DE LINEA',6 => 'MOTOSIERRISTA',7 => 'ESTROBADOR',8 => 'DESCORTEZADOR',9 => 'ARRIERO',
        10 => 'GUADAÑADOR',11 => 'CAMINERO',12 => 'APRENDIZ SENA',13 => 'SILVICULTOR',14 => 'MECANICO',
        15 => 'COORDINADOR OPERATIVO',16 => 'COORDINADOR SSTAV',17 => 'GERENTE',
        18 => 'ASISTENTE ADMINISTRATIVO',19 => 'GESTOR FINANCIERO',20 => 'GESTOR DE SISTEMAS DE INFORMACION',
        21 => 'AUXILIAR SSTAV',22 => 'SUPERVISOR DE SILVICULTURA',23 => 'SUPERVISOR DE VIAS',
        24 => 'GESTOR ADMINISTRATIVO',25 => 'GESTOR DEL RIESGO',26 => 'COORDINADOR AMBIENTAL',
        27 => 'SUPERNUMERARIO',28 => 'APRENDIZ UNIVERSITARIO',29 => 'AUXILIAR ASERRIO',30 => 'MEDIDOR',
        31 => 'OPERADOR ASERRIO',32 => 'OPERADOR DE EVACUACION Y CARGUE',33 => 'OPERADOR DE EXTRACCION',
        34 => 'OPERADOR MAQUINARIA',35 => 'COORDINADOR RECURSOS HUMANOS',36 => 'COORDINADOR OPERATIVO',
        37 => 'RECIBIDOR DE VIAS',38 => 'MAMPOSTERO',39 => 'AUXILIAR DE MAMPOSTERIA',40 => 'INVESTIGADOR',
        41 => 'INGENIERO CIVIL', 42 => 'INGENIERO FORESTAL', 43 => 'SOCIAL', 44 => 'MEJORADORA SOCIAL',
        45 => 'OFICIOS VARIOS'
    ];

    $nucleos=[
        1 => "SANTA ROSA DE CABAL", 2 => "QUINDIO", 3 => "RIOSUCIO"
    ];

    $nucleosEmpleado=[
        1 => '<span class="badge badge bg-primary">SR</span>', 
        2 => '<span class="badge bg-success">QD</span>',
        3 => '<span class="badge bg-info">RS</span>'
    ];

    $estados=[
        1 => '<span class="badge bg-success">Activo</span>', 
        2 => '<span class="badge bg-danger">Inactivo</span>'
    ];

    $estadosIngSal=[
        1 => '<span class="badge bg-success">Ingreso</span>', 
        2 => '<span class="badge bg-danger">Salida</span>'
    ];

    $estadosEmpleado=[
        1 => 'Activo', 
        2 => 'Inactivo'
    ];

    $parentescos=[
        1 => 'FAMILIAR',
        2 => 'CONYUGUE',
        3 => 'AMIGO',
        4 => 'COMPAÑERO DE TABAJO'
    ];

    $programas=[
        1 => "HIPOACUSIA NEUROSENCONRIAL BILATERAL", 2 => "DESORDENES MUSCULOESQUELETICOS", 
        3 => "SEGURIDAD INDUSTRIAL", 4 => "HIGIENE INDUSTRIAL", 5 => "RIESGO MECÁNICO", 
        6 => "RIESGO QUÍMICO", 7 => "FÍSICO", 8 => "OSTEOMUSCULAR", 9 => "MEDICINA PREVENTIVA Y DEL TRABAJO",
        10 => "SEGURIDAD VIAL", 11 => "RIESGO PSICOLABORAL", 12 => "RIESGO LOCATIVO", 13 => "RUIDO", 
        14 => "CARDIOVASCULAR"
    ];

    $procesos=[
        1 => "DIRECCIONAMIENTO ESTRATEGICO", 2 => "SILVICULTURA", 3 => "APROVECHAMIENTO", 
        4 => "ADMINISTRATIVO", 5 => "FINANCIERO", 6 => "GESTION DEL RIESGO", 
        7 => "GESTION DE LA INFORMACION", 8 => "SOCIAL", 9 => "VIAS", 10 => "INVENTARIO FORESTAL", 
        11 => "OPERATIVO" 
    ];

    $eventos=[
        1 => "ACCIDENTE DE TRABAJO", 2 => "ACCIDENTE DE TRÁNSITO", 3 => "ACCIDENTE LABORAL", 
        4 => "ENFERMEDAD GENERAL", 5 => "LICENCIA", 6 => 'CALAMIDAD DOMESTICA', 
        7 => 'INJUSTIFICADA', 8 => 'PERMISO LABORAL',
    ];

    $meses=[
        1 => "ENERO", 2 => "FEBRERO", 3 => "MARZO", 4 => "ABRIL", 5 => "MAYO", 6 => "JUNIO", 7 => "JULIO", 
        8 => "AGOSTO", 9 => "SEPTIEMBRE", 10 => "OCTUBRE", 11 => "NOVIEMBRE", 12 => "DICIEMBRE" 
    ];

    $peligros=[
        1 => "BIOLÓGICO", 2 => "BIOMECÁNICO", 3 => "CONDICIONES DE SEGURIDAD", 4 => "FÍSICO", 
        5 => "QUÍMICO", 6 => "PSICOLABORAL", 7 => "LOCATIVO", 8 => "MECANICO", 9 => "TRANSITO", 
        10 => "PÚBLICO", 11 => "FENOMENOS NATURALES", 13 => 'ILUMINACION', 14 => 'VIBRACION', 
        15 => 'TEMPERATURAS EXTREMAS', 16 => 'PRESION ATMOSFERICA', 17 => 'RADIACIONES IONIZANTES', 
        18 => 'RADIACIONES NO IONIZANTES', 19 => 'RUIDO', 20 => 'ELECTRICO', 21 => 'TECNOLOGICO', 
        22 => 'TRABAJO EN ALTURAS', 23 => 'ESPACIOS CONFINADOS'
    ];

    $epss=[
        1 => "A.I.C EPSI", 2 => "ASMET SALUD EPS S.A.S.", 3 => "COMPENSAR", 4 => "COOMEVA E.P.S S.A.", 
        5 => "COOSALUD EPS S.A.", 6 => "COPI ATLANTICO", 7 => "EPS S.O.S", 8 => "EPS SANITAS S.A.S.", 
        9 => "EPS SURAMERICANA S.A.", 10 => "MEDIMAS EPS S.A.S.", 11 => "NUEVA EPS S.A.", 
        12 => "PIJAOS SALUD EPSI", 13 => "SALUD TOTAL S.A.", 14 => 'N/A', 15 => 'PREVISORA SEGUROS',
        16 => 'EMSSANAR S.A.S', 17 => 'FAMISANAR EPS S.A.S'
    ];

    $estados_aus=[
        1 => "RADICADA", 2 => "PENDIENTE", 3 => "APROBADA", 4 => "LIQUIDADA"
    ];

    $estados_aus_index=[
        1 => '<span class="badge bg-success">Radicada</span>', 
        2 => '<span class="badge bg-warning text-dark">Pendiente <br>por <br>radicar</span>', 
        3 => '<span class="badge bg-primary">Aprobada</span>', 
        4 => '<span class="badge bg-info text-dark">Liquidada</span>',
    ];

    $prorrogas=[
        1 => "SI", 2 => "NO"
    ];

    $origenes_dc=[
        1 => 'Interno', 2 => 'Externo',
    ];

    $tipos_dc=[
       1 => 'Formato', 2 => 'Instructivo', 3 => 'Subprograma', 4 => 'Procedimiento', 5 => 'Documento', 
       6 => 'Norma', 7 => 'Programa', 8 => 'Politica', 9 => 'Manual', 10 => 'Matriz', 11 => 'Plan', 
       12 => 'Listado', 13 => 'Cronograma', 14 => 'Plantilla'
    ];

    $estados_civiles=[
        1 => "SOLTERO", 2 => "CASADO", 3 => "UNION LIBRE"
    ];

    $generos=[
        1 => "MASCULINO", 2 => "FEMENINO", 3 => "OTRO",
    ];

    $razas=[
        1 => "MESTIZO", 2 => "MULATO", 3 => "ZAMBO", 4 => "AFROAMERICANO", 5 => "BLANCO", 6 => "INDÍGENA"
    ];

    $rhs=[
        1 => "A+", 2 => "A-", 3 => "B+", 4 => "B-", 5 => "AB+", 6 => "AB-", 7 => "O+", 8 => "O-",
    ];

    $pensiones=[
        1 => "PROTECCION S.A.", 2 => "PORVENIR S.A.", 3 => "COLPENSIONES", 4 => "OLD MUTUAL", 
        5 => "NINGUNA AFP", 6 => "COLFONDOS",
    ];

    $cajas=[
        1 => "COMFAMILIAR RISARALDA", 2 => "COMFACALDAS", 3 => "COMFENALCO QUINDIO", 
        4 => "COMFENALCO VALLE", 5 => "NINGUNA CAJA",
    ];

    $niveles_educativos=[
        1 => "NINGUNO", 2 => "BASICA PRIMARIA", 3 => "SECUNDARIA", 4 => "MEDIA VOCACIONAL", 
        5 => "TECNICO", 6 => "TECNOLOGO", 7 => "PROFESIONAL", 8 => "ESPECIALISTA", 9 => "MAGISTER", 
        10 => "DOCTOR",
    ];

    $tipos_vivienda=[
        1 => "PROPIA", 2 => "FAMILIAR", 3 => "ALQUILADA", 4 => "POR DEFINIR",
    ];

    $agente_lesion=[
        1 => 'Maquinas y/o equipos', 2 => 'Aparatos', 3 => 'Materiales o sustancias', 
        4 => 'Radiaciones', 5 => 'Animales', 6 => 'Herramientas, implementos o utensilios', 
        7 => 'Medios de transporte', 8 => 'Agentes no clasificados por falta de datos', 
        9 => 'Ambiente de trabajo', 10 => 'Otros agentes de lesion'
    ];

    $supervisores=[
        1 => 'William Ramirez', 2 => 'Grimanesa Ramirez', 3 => 'Diego Mazzo', 4 => 'Leonardo Montoya', 
        5 => 'Juan David Ramirez', 6 => 'Fabio Noreña', 7 => 'Alex Garces', 8 => 'Javier Gomez', 
        9 => 'Sergio Garcia', 10 => 'Jennifer Rios', 11 => 'Jose Alberto Cruz', 12 => 'Edilson Grajales', 
        13 => 'Gerson Idarraga', 14 => 'Ruben Fernando', 15 => 'Luisa Fernanda Cortes', 
    ];

    $fincas=[
        1 => '15-ALTO_', 2 => '15-ANGLA', 3 => '15-SIRIA', 4 => '15-SNANT', 5 => '15-SNJOS', 
        6 => '15-SNRMN', 7 => '15-TAURO', 8 => '15-TESAL', 9 => '15-XIMEN', 10 => '15-ZACAT', 
        11 => '15-BALKA', 12 => '15-BELLA', 13 => '15-BRILL', 14 => '15-CAMPA', 15 => '15-CARME', 
        16 => '15-CINAB', 17 => '15-ESPEJ', 18 => '15-GALAX', 19 => '15-GAVIO', 20 => '15-MARIA', 
        21 => '15-PISCI', 22 => '15-RIEL', 23 => '15-SELVA', 24 => '15-SERR2', 25 => '15-SIBER', 
        26 => '15-SIBET', 27 => '15-SINAI', 28 => '15-SIRIA', 29 => '15-SNANT', 30 => '15-SNJOS', 
        31 => '15-SNRMN', 32 => '11-EMILI', 33 => '11-ANDES', 34 => '11-FLORE', 35 => '11-DELIC', 
        36 => '11-GUAYA', 37 => '11-TESAL', 38 => '11-SONOR', 39 => '11-GRECI', 40 => '11-TESOR', 
        41 => '11-MASEN', 42 => '11-PALMA', 43 => '11-BUEAI', 44 => '11-JAMAI', 45 => '11-LAAME', 
        46 => '11-CAROJ', 47 => '11-ELCON', 48 => '11-BOLIV', 49 => '11-LASIE', 50 => '11-ALEGR', 
        51 => '12-PERLA', 52 => '12-AMERI', 53 => '12-SOLED', 54 => '12-PALMA', 55 => '12-FELIS', 
        56 => '12-ARG', 57 => '12-BETAN', 58 => '12-GRAMI', 59 => '12-ROBLE', 60 => '12-MANZA', 
        61 => '12-LACEB', 62 => '12-BUEAI', 63 => '12-YANAH', 64 => '12-CAMPA', 65 => '12-CHINA', 
        66 => '12-MIRAN',
    ];

    $lugares=[
        1 => 'Oficina', 2 => 'Areas de produccion', 3 => 'Almacenes o depositos',
        4 => 'Areas recreativas o deportivas', 5 => 'Corredores o pasillos', 6 => 'Escaleras',
        7 => 'Parqueaderos o areas de circulacion vehicular', 8 => 'Otras areas comunes', 9 => 'otro'
    ];

    $eventos_acc=[
        1 => 'Accidente mortal', 2 => 'Accidente grave', 3 => 'Accidente leve', 4 => 'Accidente', 
        5 => 'Incidente', 
    ];

    $mecanismos=[
        1 => 'Atrapamiento', 2 => 'Caida de objetos', 3 => 'Caida de personas', 
        4 => 'Pisadas, choques o golpes', 
        5 => 'Exposicion o contacto con sustancias nocivas, o radiaciones, o salpicaduras', 
        6 => 'Exposicion o contacto con la electricidad', 7 => 'Golpes por o contra objetos', 
        8 => 'Exposicion o contacto con temperaturas extremas', 
        9 => 'Sobreesfuerzo, esfuerzo excesivo o falso movimiento', 10 => 'Otro', 
    ];

    $tipo_lesion=[
        1 => 'Amputación o ennucleacion', 2 => 'Golpe, confusion o plastamiento', 3 => 'Asfixia', 
        4 => 'Efecto del tiempo, del clima u otro relacionado con el ambiente', 
        5 => 'Efecto de electricidad', 6 => 'Efecto nocivo de la radiacion', 7 => 'Lesiones multiples', 
        8 => 'Trauma superficial', 9 => 'Fractura', 10 => 'Herida',
        11 => 'Laceracion de musculo o tendon sin herida', 12 => 'Quemadura', 
        13 => 'Torcedura o esguince, desgarro muscular, hernia o laceracion de tendon sin herida', 
        14 => 'Conmocion o trauma interno', 15 => 'Envenenamiento o intoxicacion aguda o alergia', 
        16 => 'Otro', 
    ];

    $parte_afectada=[
        1 => 'N/A', 2 => 'Abdomen', 3 => 'Tronco (espalda, columna vertebral, medula espinal, pelvis)', 
        4 => 'Torax', 5 => 'Miembros superiores', 6 => 'Miembros inferiores', 7 => 'Cabeza', 8 => 'Cuello', 
        9 => 'Lesiones generales u otras', 10 => 'Manos', 11 => 'Ojos', 12 => 'Pies', 
        13 => 'Ubicaciones multiples'
    ];

    $dias_semana=[
        1 => 'LUNES', 2 => 'MARTES', 3 => 'MIERCOLES', 4 => 'JUEVES', 
        5 => 'VIERNES', 6 => 'SABADO', 7 => 'DOMINGO',
    ];

    $unidades=[
        1 => 'Metros Estéreos', 2 => 'Jornales', 
    ];

    $labores=[
        1 => 'Ciere de Vía', 2 => 'Jornal Sierrero', 3 => 'Preinstalación', 4 => 'Halada de Madera', 
        5 => 'Capacitación de Alturas', 6 => 'Operado', 7 => 'Estrobado', 8 => 'Operado de Doble Movimiento', 
        9 => 'Picket', 10 => 'Halada de Arboles Especiales', 11 => 'Trazado', 
        12 => 'Tumba de Arboles Especiales', 13 => 'Ubicación de Madera', 
        14 => 'Operado de Harvester en Aserrio', 15 => 'Operado de Harvester con Pulpa', 
        16 => 'Traslado de Equipos', 17 => 'Halada PLP', 18 => 'Estrobado en Aserrio', 
    ];

    $cat_daño=[
        1 => "Bienes", 2 => "Muebles o infraestructura", 3 => "Equipo, herramientas o accesorios",
        4 => "Elementos de protección", 5 => "Daño a terceros"
    ];
?>