<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sipei_unidades', function (Blueprint $table) {
            $table->id()->unique()->autoincrement();
            $table->string('unidad')->nullable(false)->unique();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable(true)->default(null);
            $table->boolean('status')->default(true);
        });        

        DB::table('sipei_unidades')->insert([
            array('id' => 101, 'unidad' => 'Consejo Universitario'),
            array('id' => 102, 'unidad' => 'Junta de Gobierno'),
            array('id' => 103, 'unidad' => 'Rectoría'),
            array('id' => 104, 'unidad' => 'Secretaría General'),
            array('id' => 105, 'unidad' => 'Secretaría Académica'),
            array('id' => 106, 'unidad' => 'Abogado General'),
            array('id' => 107, 'unidad' => 'Tesorería General'),
            array('id' => 108, 'unidad' => 'Coordinación General de Planeación y Administración'),
            array('id' => 109, 'unidad' => 'Órgano Interno de Control'),
            array('id' => 110, 'unidad' => 'Dirección de Auditoría'),
            array('id' => 111, 'unidad' => 'Departamento de Auditoría Financiera'),
            array('id' => 112, 'unidad' => 'Departamento de Auditoría Administrativa y Académica'),
            array('id' => 113, 'unidad' => 'Dirección de Responsabilidades'),
            array('id' => 114, 'unidad' => 'Departamento de Quejas, Sanciones e Inconformidades'),
            array('id' => 115, 'unidad' => 'Secretaría Ejecutiva de la Rectoría'),
            array('id' => 116, 'unidad' => 'Coordinación de Logística (Sec. Ejecutiva Rectoría)'),
            array('id' => 117, 'unidad' => 'Coordinación de Despacho'),
            array('id' => 118, 'unidad' => 'Coordinación de Seguridad'),
            array('id' => 119, 'unidad' => 'Departamento de Gestión y Seguimiento'),
            array('id' => 120, 'unidad' => 'Departamento de Imagen Institucional'),
            array('id' => 121, 'unidad' => 'Dirección de Comunicación Universitaria'),
            array('id' => 122, 'unidad' => 'Coordinación de Información'),
            array('id' => 123, 'unidad' => 'Departamento de Información'),
            array('id' => 124, 'unidad' => 'Departamento de Difusión'),
            array('id' => 125, 'unidad' => 'Departamento de Producción Audiovisual'),
            array('id' => 126, 'unidad' => 'Coordinación de Radio'),
            array('id' => 127, 'unidad' => 'Departamento de Producción Radiofónica'),
            array('id' => 128, 'unidad' => 'Departamento de Programación Radiofónica'),
            array('id' => 129, 'unidad' => 'Departamento de Control Financiero'),
            array('id' => 130, 'unidad' => 'Departamento de Eventos Especiales'),
            array('id' => 131, 'unidad' => 'Coordinación de Servicios de Extensión'),
            array('id' => 132, 'unidad' => 'Programa Universitario para el Desarrollo Intantil y de Educación Preescolar'),
            array('id' => 133, 'unidad' => 'Museo Indígena de Arte Contemporáneo'),
            array('id' => 134, 'unidad' => 'Departamento de Talleres de Apreciación Cultural'),
            array('id' => 135, 'unidad' => 'Departamento de Museografía y Exposiciones'),
            array('id' => 136, 'unidad' => 'Dirección General de Servicios Escolares'),
            array('id' => 137, 'unidad' => 'Coordinación de Servicios de Transporte'),
            array('id' => 138, 'unidad' => 'Departamento de Gestión Vehicular'),
            array('id' => 139, 'unidad' => 'Secretaría de Acuerdos'),
            array('id' => 140, 'unidad' => 'Departamento de Seguimiento de Acuerdos'),
            array('id' => 141, 'unidad' => 'Dirección de Normatividad Institucional'),
            array('id' => 142, 'unidad' => 'Departamento de Proyectos Normativos'),
            array('id' => 143, 'unidad' => 'Departamento de Compilación y Difusión Jurídica'),
            array('id' => 144, 'unidad' => 'Dirección de Transparencia Institucional'),
            array('id' => 145, 'unidad' => 'Departamento de Servicios de Información'),
            array('id' => 146, 'unidad' => 'Departamento de Contraloría Social'),
            array('id' => 147, 'unidad' => 'Dirección de Administración Escolar'),
            array('id' => 148, 'unidad' => 'Departamento de Trayectoria Académico Administrativa Estudiantil'),
            array('id' => 149, 'unidad' => 'Departamento de Posgrado'),
            array('id' => 150, 'unidad' => 'Departamento de Admisión'),
            array('id' => 151, 'unidad' => 'Departamento de Expedición de Documentos'),
            array('id' => 152, 'unidad' => 'Departamento de Control Escolar'),
            array('id' => 153, 'unidad' => 'Departamento de Permanencia de Escuelas Incorporadas'),
            array('id' => 154, 'unidad' => 'Departamento de Expedición de Documentos de Escuelas Incorporadas'),
            array('id' => 155, 'unidad' => 'Departamento de Sistema Escolar'),
            array('id' => 156, 'unidad' => 'Dirección de Gestión de Archivos'),
            array('id' => 157, 'unidad' => 'Coordinación de la Oficina de Correspondencia de la Administración Central'),
            array('id' => 158, 'unidad' => 'Departamento de Archivo de Concentración'),
            array('id' => 159, 'unidad' => 'Departamento de Archivo en Trámite'),
            array('id' => 160, 'unidad' => 'Dirección de Protección y Asistencia'),
            array('id' => 161, 'unidad' => 'Coordinación de Protección'),
            array('id' => 162, 'unidad' => 'Departamento de Supervisión de Zona Norte'),
            array('id' => 163, 'unidad' => 'Departamento de Supervisión de Zona Sur'),
            array('id' => 164, 'unidad' => 'Coordinación de Asistencia'),
            array('id' => 165, 'unidad' => 'Secretaría Técnica'),
            array('id' => 166, 'unidad' => 'Departamento de Becas'),
            array('id' => 167, 'unidad' => 'Departamento de Seguridad Social Estudiantil'),
            array('id' => 168, 'unidad' => 'Coordinación de Logística (Sec. General)'),
            array('id' => 169, 'unidad' => 'Coordinación de Comisiones Académica'),
            array('id' => 170, 'unidad' => 'Departamento de Asuntos Académicos'),
            array('id' => 171, 'unidad' => 'Departamento de Comisiones Académicas'),
            array('id' => 172, 'unidad' => 'Coordinación de Cooperación Nacional e Internacional'),
            array('id' => 173, 'unidad' => 'Departamento de Movilidad Docente'),
            array('id' => 174, 'unidad' => 'Departamento de Movilidad Estudiantil'),
            array('id' => 175, 'unidad' => 'Dirección de Publicaciones y Divulgación'),
            array('id' => 176, 'unidad' => 'Departamento de Edición'),
            array('id' => 177, 'unidad' => 'Departamento de Producción'),
            array('id' => 178, 'unidad' => 'Departamento de Gestión y Control'),
            array('id' => 179, 'unidad' => 'Departamento de Comunicación'),
            array('id' => 180, 'unidad' => 'Dirección de Investigación y Posgrado'),
            array('id' => 181, 'unidad' => 'Coordinación de Estudios de Posgrado'),
            array('id' => 182, 'unidad' => 'Departamento de Evaluación de Programas de Posgrado'),
            array('id' => 183, 'unidad' => 'Departamento de Diseño y Reestructuración Curricular'),
            array('id' => 184, 'unidad' => 'Departamento de Proyectos de Investigación PRODEP'),
            array('id' => 185, 'unidad' => 'Departamento de Gestión de PRODEP'),
            array('id' => 186, 'unidad' => 'Departamento de Consolidación de la Investigación'),
            array('id' => 187, 'unidad' => 'Departamento de Estímulos Académicos'),
            array('id' => 188, 'unidad' => 'Dirección de Educación Superior'),
            array('id' => 189, 'unidad' => 'Coordinación de Educación Media Superior'),
            array('id' => 190, 'unidad' => 'Departamento de Estudios de Posgrado'),
            array('id' => 191, 'unidad' => 'Departamento de Fomento y Orientación Educativa'),
            array('id' => 192, 'unidad' => 'Coordinación de Educación Superior'),
            array('id' => 193, 'unidad' => 'Departamento de Innovación Educativa'),
            array('id' => 194, 'unidad' => 'Departamento de Formación Docente'),
            array('id' => 195, 'unidad' => 'Departamento de Evaluación Educativa'),
            array('id' => 196, 'unidad' => 'Coordinación de Estudios de Licenciatura'),
            array('id' => 197, 'unidad' => 'Departamento de Evaluación de Programas de Licenciatura'),
            array('id' => 198, 'unidad' => 'Departamento de Enlace Jurídico y Gestión'),
            array('id' => 199, 'unidad' => 'Dirección de Educación Permanente'),
            array('id' => 200, 'unidad' => 'Departamento de Capacitación Estratégica y Certificación'),
            array('id' => 201, 'unidad' => 'Departamento Administrativo (Dir. Educación Permanente)'),
            array('id' => 202, 'unidad' => 'Dirección de Vinculación Académica'),
            array('id' => 203, 'unidad' => 'Coordinación de Contratos de Servicios'),
            array('id' => 204, 'unidad' => 'Departamento de Servicio Social'),
            array('id' => 205, 'unidad' => 'Departamento de Servicios Técnicos'),
            array('id' => 206, 'unidad' => 'Departamento de Negocios y Emprendimiento Universitario'),
            array('id' => 207, 'unidad' => 'Departamento del Centro de Patentamiento'),
            array('id' => 208, 'unidad' => 'Dirección de Lenguas'),
            array('id' => 209, 'unidad' => 'Departamento del Centro de Lenguas de Cuernavaca'),
            array('id' => 210, 'unidad' => 'Departamento del Centro de Lenguas de Cuautla'),
            array('id' => 211, 'unidad' => 'Departamento del Centro de Lenguas de Jojutla'),
            array('id' => 212, 'unidad' => 'Dirección de Deporte'),
            array('id' => 213, 'unidad' => 'Departamento de Actividades Deportivas'),
            array('id' => 214, 'unidad' => 'Departamento de Selecciones Deportivas'),
            array('id' => 215, 'unidad' => 'Dirección de Cultura'),
            array('id' => 216, 'unidad' => 'Departamento de Formación Artística'),
            array('id' => 217, 'unidad' => 'Dirección de Investigación Educativa'),
            array('id' => 218, 'unidad' => 'Dirección de Formación Multimodal'),
            array('id' => 219, 'unidad' => 'Departamento de Gestión Operativa'),
            array('id' => 220, 'unidad' => 'Departamento de Producción de Recursos Educativos'),
            array('id' => 221, 'unidad' => 'Departamento de Desarrollo Formacional'),
            array('id' => 222, 'unidad' => 'Departamento de Operación Técnica'),
            array('id' => 223, 'unidad' => 'Dirección de Asuntos Jurídicos'),
            array('id' => 224, 'unidad' => 'Coordinación de Asuntos Laborales'),
            array('id' => 225, 'unidad' => 'Coordinación de Asuntos Civíles, Administrativos y Amparos Penales'),
            array('id' => 226, 'unidad' => 'Dirección de Contratos y Convenios'),
            array('id' => 227, 'unidad' => 'Coordinación de Contratos de Obras'),
            array('id' => 228, 'unidad' => 'Coordinación de Convenios Institucionales'),
            array('id' => 229, 'unidad' => 'Departamento de Convenios Académicos'),
            array('id' => 230, 'unidad' => 'Coordinación de Contratos de Arrendamiento y Adquisiciones'),
            array('id' => 231, 'unidad' => 'Departamento de Arendamientos y Adquisiciones'),
            array('id' => 232, 'unidad' => 'Coordinación Unidad de Atención de Víctimas de Violencia'),
            array('id' => 233, 'unidad' => 'Departamento de Atención a Víctimas'),
            array('id' => 234, 'unidad' => 'Departamento de Análisis y Dictaminación'),
            array('id' => 235, 'unidad' => 'Dirección de Ingresos'),
            array('id' => 236, 'unidad' => 'Departamento de Control de Ingresos'),
            array('id' => 237, 'unidad' => 'Dirección de Egresos'),
            array('id' => 238, 'unidad' => 'Departamento de Control de Egresos'),
            array('id' => 239, 'unidad' => 'Dirección de la Unidad Los Belenes'),
            array('id' => 240, 'unidad' => 'Departamento Administrativo (Los Belenes)'),
            array('id' => 241, 'unidad' => 'Dirección General de Planeación Institucional'),
            array('id' => 242, 'unidad' => 'Dirección de Planeación y Evaluación'),
            array('id' => 243, 'unidad' => 'Departamento de Proyectos Estratégicos'),
            array('id' => 244, 'unidad' => 'Departamento de Evaluación'),
            array('id' => 245, 'unidad' => 'Departamento de Información Institucional'),
            array('id' => 246, 'unidad' => 'Dirección de Seguimiento Programático'),
            array('id' => 247, 'unidad' => 'Departamento de Seguimiento de Proyectos Extraordinarios'),
            array('id' => 248, 'unidad' => 'Departamento de Seguimiento de Proyectos Estratégicos'),
            array('id' => 249, 'unidad' => 'Departamento de Integración de Informes'),
            array('id' => 250, 'unidad' => 'Dirección General de Administración'),
            array('id' => 251, 'unidad' => 'Dirección de Presupuestos'),
            array('id' => 252, 'unidad' => 'Departamento de Financiamiento Ordinario'),
            array('id' => 253, 'unidad' => 'Departamento de Financiamiento Extraordinario'),
            array('id' => 254, 'unidad' => 'Departamento de Financiamiento de Recursos Autogenerados'),
            array('id' => 255, 'unidad' => 'Departamento de Gestión y Control de Gastos Fijos'),
            array('id' => 256, 'unidad' => 'Dirección de Contabilidad'),
            array('id' => 257, 'unidad' => 'Departamento de Registro Contable'),
            array('id' => 258, 'unidad' => 'Departamento de Infoormes Contables'),
            array('id' => 259, 'unidad' => 'Departamento de Resguardo Patrimonial'),
            array('id' => 260, 'unidad' => 'Departamento de Atención de Tutorías'),
            array('id' => 261, 'unidad' => 'Dirección de Personal'),
            array('id' => 262, 'unidad' => 'Departamento de Nómina'),
            array('id' => 263, 'unidad' => 'Departamento de Selección y Contratación'),
            array('id' => 264, 'unidad' => 'Departamento de Regulación Laboral'),
            array('id' => 265, 'unidad' => 'Dirección de Recursos Materiales'),
            array('id' => 266, 'unidad' => 'Departamento de Compras y Contratos'),
            array('id' => 267, 'unidad' => 'Departamento de Almacén Central'),
            array('id' => 268, 'unidad' => 'Dirección de Gestión de la Calidad'),
            array('id' => 269, 'unidad' => 'Departamento del Sistema de Gestión de la Calidad'),
            array('id' => 270, 'unidad' => 'Departamento de Gestión de Auditorías y de Certificación'),
            array('id' => 271, 'unidad' => 'Departamento de Auditorías Ambientales'),
            array('id' => 272, 'unidad' => 'Departamento de Gestión de Desarrollo de Procesos'),
            array('id' => 273, 'unidad' => 'Departamento del Sistema de Gestión Ambiental'),
            array('id' => 274, 'unidad' => 'Departamento del Sistema de Gestión de Seguridad de la Información'),
            array('id' => 275, 'unidad' => 'Dirección de Desarrollo de Bibliotecas'),
            array('id' => 276, 'unidad' => 'Departamento de Procesos Técnicos'),
            array('id' => 277, 'unidad' => 'Departamento de Servicios Bibliotecarios'),
            array('id' => 278, 'unidad' => 'Departamento de Servicios Digitales'),
            array('id' => 279, 'unidad' => 'Departamento de Desarrollo de Colecciones'),
            array('id' => 280, 'unidad' => 'Departamento de Gestión de Bienes y Suministros'),
            array('id' => 281, 'unidad' => 'Dirección General de Tecnolgías de Información y de Comunicación'),
            array('id' => 282, 'unidad' => 'Dirección de Sistemas de Información'),
            array('id' => 283, 'unidad' => 'Departamento de Desarrollo de Aplicaciones'),
            array('id' => 284, 'unidad' => 'Departamento de Gestión de Bases de Datos'),
            array('id' => 285, 'unidad' => 'Departamento de Sistemas de Gestión'),
            array('id' => 286, 'unidad' => 'Departamento de Desarrollo Web'),
            array('id' => 287, 'unidad' => 'Dirección de Plataformas Tecnológicas'),
            array('id' => 288, 'unidad' => 'Departamento de Voz, Datos y Video'),
            array('id' => 289, 'unidad' => 'Departamento de Gestión de Redes'),
            array('id' => 290, 'unidad' => 'Departamento de Centros de Datos'),
            array('id' => 291, 'unidad' => 'Dirección de Sistemas Académicos'),
            array('id' => 292, 'unidad' => 'Departamento de Unidad de Recursos Digitales Académicos'),
            array('id' => 293, 'unidad' => 'Departamento de Unidad de Desarrollo de Infraestructura Tecnológica para la Academia'),
            array('id' => 294, 'unidad' => 'Departamento de Unidad de Gestión e Innovación Digital para la Academia'),
            array('id' => 295, 'unidad' => 'Departamento de Desarrollo de Proyectos'),
            array('id' => 296, 'unidad' => 'Departamento de Soporte Técnico'),
            array('id' => 297, 'unidad' => 'Departamento de Administración'),
            array('id' => 298, 'unidad' => 'Dirección General de Infraestructura'),
            array('id' => 299, 'unidad' => 'Dirección de Mantenimiento y Conservación'),
            array('id' => 300, 'unidad' => 'Departamento de Mantenimiento'),
            array('id' => 301, 'unidad' => 'Departamento de Conservación'),
            array('id' => 302, 'unidad' => 'Dirección de Desarrollo de Infraestructura'),
            array('id' => 303, 'unidad' => 'Coordinación de Costos'),
            array('id' => 304, 'unidad' => 'Departamento de Insumos de Obras'),
            array('id' => 305, 'unidad' => 'Departamento de Proyectos'),
            array('id' => 306, 'unidad' => 'Departamento de Supervisión'),
            array('id' => 307, 'unidad' => 'Coordinación Jurídica y Administrativa'),
            array('id' => 308, 'unidad' => 'Departamento de Licitaciones y Contratos'),
            array('id' => 309, 'unidad' => 'Departamento Administrativo'),
            array('id' => 310, 'unidad' => 'Dirección General de Desarrollo Sustentable'),
            array('id' => 311, 'unidad' => 'Departamento de Sustentabilidad Ambiental y Residuos'),
            array('id' => 312, 'unidad' => 'Departamento de Recursos Naturales'),
            array('id' => 313, 'unidad' => 'Departamento de Educación Ambiental'),
            array('id' => 314, 'unidad' => 'Departamento de Comunicación Ambiental'),
            array('id' => 315, 'unidad' => 'Procurador de los Derechos Académicos'),
            array('id' => 316, 'unidad' => 'Subprocurador de os Derechos Académicos'),
            array('id' => 317, 'unidad' => 'Coordinación de Quejas'),
            array('id' => 318, 'unidad' => 'Departamento de Asesoría y Capacitación'),
            array('id' => 319, 'unidad' => 'Unidad para la Inclusión Educativa y Atención a la Diversidad'),
            array('id' => 320, 'unidad' => 'Departamento de Inclusión Educativa'),
            array('id' => 321, 'unidad' => 'Departamento de Atención a la Diversidad'),
            array('id' => 322, 'unidad' => 'Departamento de Vinculación'),
            array('id' => 323, 'unidad' => 'Departamento de Evaluación de Indicadores de Inclusión Educativa'),
            array('id' => 324, 'unidad' => 'Escuela Preparatoria Número Uno, Cuernavaca'),
            array('id' => 325, 'unidad' => 'Escuela Preparatoria Número Dos, Cuernavaca'),
            array('id' => 326, 'unidad' => 'Escuela Preparatoria Número Tres, Cuautla'),
            array('id' => 327, 'unidad' => 'Escuela Preparatoria Número Cuatro, Jojutla'),
            array('id' => 328, 'unidad' => 'Escuela Preparatoria Número Cinco, Puente de Ixtla '),
            array('id' => 329, 'unidad' => 'Escuela Preparatoria Número Seis, Tlaltizapán'),
            array('id' => 330, 'unidad' => 'Escuela Preparatoria Comunitaria de Tres Marías'),
            array('id' => 331, 'unidad' => 'Escuela de Técnicos Laboratoristas'),
            array('id' => 332, 'unidad' => 'Escuela de Estudios Superiores de Atlatlahucan'),
            array('id' => 333, 'unidad' => 'Escuela de Estudios Superiores de Atlatlahucan Subsede Totolapan'),
            array('id' => 334, 'unidad' => 'Escuela de Estudios Superiores de Jonacatepec'),
            array('id' => 335, 'unidad' => 'Escuela de Estudios Superiores de Jonacatepec Subsede Axochiapan'),
            array('id' => 336, 'unidad' => 'Escuela de Estudios Superiores de Jonacatepec Subsede Tepalcingo'),
            array('id' => 337, 'unidad' => 'Escuela de Estudios Superiores de Mazatepec'),
            array('id' => 338, 'unidad' => 'Escuela de Estudios Superiores de Mazatepec Subsede Miacatlán'),
            array('id' => 339, 'unidad' => 'Escuela de Estudios Superiores de Mazatepec Subsede Tetecala'),
            array('id' => 340, 'unidad' => 'Escuela de Estudios Superiores del Jicarero'),
            array('id' => 341, 'unidad' => 'Escuela de Estudios Superiores de Xalostoc'),
            array('id' => 342, 'unidad' => 'Escuela de Estudios Superiores de Jojutla'),
            array('id' => 343, 'unidad' => 'Escuela de Estudios Superiores de Tlayacapan'),
            array('id' => 344, 'unidad' => 'Escuela de Estudios Superiores de Yecapixtla'),
            array('id' => 345, 'unidad' => 'Escuela de Estudios Superiores de Yautepec'),
            array('id' => 346, 'unidad' => 'Escuela de Turismo'),
            array('id' => 347, 'unidad' => 'Escuela de Teatro, Danza y Música'),
            array('id' => 348, 'unidad' => 'Facultad de Arquitectura'),
            array('id' => 349, 'unidad' => 'Facultad de Artes'),
            array('id' => 350, 'unidad' => 'Facultad de Ciencias Agopecuarias'),
            array('id' => 351, 'unidad' => 'Facultad de Ciencias Biológicas'),
            array('id' => 352, 'unidad' => 'Facultad de Ciencias del Deporte'),
            array('id' => 353, 'unidad' => 'Facultad de Ciencias Químicas e Ingeniería'),
            array('id' => 354, 'unidad' => 'Facultad de Comunicación Humana'),
            array('id' => 355, 'unidad' => 'Facultad de Contaduría, Administración e Informática'),
            array('id' => 356, 'unidad' => 'Facultad de Derecho y Ciencias Sociales'),
            array('id' => 357, 'unidad' => 'Facultad de Diseño'),
            array('id' => 358, 'unidad' => 'Facultad de Estudios Sociales'),
            array('id' => 359, 'unidad' => 'Facultad de Estudios Superiores de Cuautla'),
            array('id' => 360, 'unidad' => 'Facultad de Enfermería'),
            array('id' => 361, 'unidad' => 'Facultad de Farmacia'),
            array('id' => 362, 'unidad' => 'Facultad de Medicina'),
            array('id' => 363, 'unidad' => 'Facultad de Nutrición'),
            array('id' => 364, 'unidad' => 'Facultad de Psicología'),
            array('id' => 365, 'unidad' => 'Centro de Investigación en Biodiversidad y Conservación'),
            array('id' => 366, 'unidad' => 'Centro de Investigaciones Biológicas'),
            array('id' => 367, 'unidad' => 'Centro de Investigación en Biotecnología'),
            array('id' => 368, 'unidad' => 'Centro de Investigación en Ciencias'),
            array('id' => 369, 'unidad' => 'Centro de Investigación en Dinámica Celular'),
            array('id' => 370, 'unidad' => 'Centro de Investigación en Ingeniería y Ciencias Aplicadas'),
            array('id' => 371, 'unidad' => 'Centro de Investigaciones Químicas'),
            array('id' => 372, 'unidad' => 'Centro de Investigación Transdisciplinar en Psicología'),
            array('id' => 373, 'unidad' => 'Centro de Investigación en Ciencias Cognitivas'),
            array('id' => 374, 'unidad' => 'Centro de Investigación en Ciencias Sociales y Estudios Regionales'),
            array('id' => 375, 'unidad' => 'Centro Interdisciplinario de Investigación en Humanidades'),
            array('id' => 376, 'unidad' => 'Centro de Investigación Interdisciplinar para el Desarrollo Universitario'),
            array('id' => 377, 'unidad' => 'Instituto de Ciencias de la Educación'),
            array('id' => 378, 'unidad' => 'Instituto de Investigación en Ciencias Básicas y Aplicadas'),
            array('id' => 379, 'unidad' => 'Instituto de Investigación en Humanidades y Ciencias Sociales')            
        ]);
        
        Schema::table('sipei_usuarios', function (Blueprint $table) {
            $table->foreign('unidad_id')->references('id')->on('sipei_unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('sipei_usuarios', function (Blueprint $table) {
            $table->dropForeign('sipei_usuarios_unidad_id_foreign');
        });
        Schema::dropIfExists('sipei_unidades');
    }
};
