// FUNCIONES PARA MOSTRAR INFO MEDIANTE LOS BOTONES DEL ARCHIVO

// Funcion para mostrar la mision de sena empresa

document
  .getElementById("mostrarMision")
  .addEventListener("click", function (event) {
    event.preventDefault();

    Swal.fire({
      cancelButtonAriaLabel: "Thumbs down",
      title: "Mision de Sena Empresa",
      text: "Somos una estrategia didáctica empresarial para los aprendices del Sena, garantizando el fortalecimiento de su formación integral mediante procesos de innovación y aprendizaje permanente, contribuyendo al mejoramiento de la calidad del servicio que el Sena ofrece a los colombianos...",
      imageUrl: "https://i.ibb.co/N7vnRY4/logo-Sena-Empresa.png",
      imageWidth: 200,
      imageHeight: 200,
      imageAlt: "logo sena empresa",
      confirmButtonColor: "#28a745",
      showCloseButton: true,
      cancelButtonText: `
    <i class="fa fa-thumbs-down"></i>`,
    });
  });

// Funcion para mostrar la vision de sena empresa

document
  .getElementById("mostrarVision")
  .addEventListener("click", function (event) {
    event.preventDefault();

    Swal.fire({
      title: "Vision de Sena Empresa",
      text: "En el año 2020 la estrategia de formación Sena-Empresa será un modelo referenciado consolidado a nivel local, regional y nacional, enmarcado en la Formación Profesional Integral, dirigida por aprendices debidamente organizados con procesos estandarizados, generando valor agregado a las tecnologías de las cadenas agropecuarias, para el desarrollo productivo y competitivo de nuestro país.",
      imageUrl: "https://i.ibb.co/N7vnRY4/logo-Sena-Empresa.png",
      imageWidth: 200,
      imageHeight: 200,
      imageAlt: "logo sena empresa",
      confirmButtonColor: "#28a745",
      showCloseButton: true,
      cancelButtonText: `
    <i class="fa fa-thumbs-down"></i>`,
    });
  });

// Funcion para mostrar que es sena empresa

document
  .getElementById("mostrarConcepto")
  .addEventListener("click", function (event) {
    event.preventDefault();

    Swal.fire({
      title: "Que es Sena Empresa",
      text: "Es una estrategia que tiene como objetivo acercarse a la realidad de las empresas mediante la producción eficiente de bienes servicios del Centro de Formación a través de la integración de los procesos productivos y la optimización del uso de los recursos del SENA, integrando de manera natural todas las actividades de las diferentes áreas de formación, trascendiendo a otras áreas como la financiera y contable, administrativa y de recursos humanos, comercialización, mercadeo y logística, la de producción y control de calidad y la gerencial.",
      imageUrl: "https://i.ibb.co/N7vnRY4/logo-Sena-Empresa.png",
      imageWidth: 200,
      imageHeight: 200,
      imageAlt: "logo sena empresa",
      confirmButtonColor: "#28a745",
      showCloseButton: true,
      cancelButtonText: `
  <i class="fa fa-thumbs-down"></i>`,
    });
  });

// funcion para mostrar la reseña historica de sena empresa

document
  .getElementById("mostraResena")
  .addEventListener("click", function (event) {
    event.preventDefault();

    Swal.fire({
      title: "Reseña Historica de Sena Empresa",
      text: "El modelo de formación mediante la estrategia de Sena empresa, nace en el año 2005 en el centro de formación La Granja en el Espinal - Tolima. Un año después el Centro Agroindustrial del Meta, conformó unos grupos de trabajo para visitar y conocer este modelo en los Centros Agropecuario La Granja en el Tolima, La Angostura y Yamboró en el Huila.Con estas experiencias se debatió y se diseñó una propuesta de modelo de Sena Empresa con base en la logística y especialidades que tenía el centro, por ello se formaron las Sena empresas de: Agrícola, Pecuaria, Agroindustria, Gestión y de Mecanización.La Sena empresa Agrícola, desarrolla diferentes proyectos para hacer las practicas requeridas de las especialidades de Producción Agrícola, Administración de Empresas Agropecuarias y otras especialidades que tienen competencias en estas áreas. Las unidades que actualmente maneja el proceso Sena Empresa son: Anón, Bioinsumos, Cacao, Guadua, Guanábana, Guayaba, Hortalizas, Laboratorio de Biotecnología, Pasifloras, Piña, Postcosecha, Vivero y Yuca.La Sena empresa Pecuaria, desarrolla diferentes proyectos para hacer las practicas requeridas de las especialidades de Producción Pecuaria, Administración de Empresas Agropecuarias y otras especialidades que tienen competencias en estas áreas. Las unidades que actualmente maneja el proceso Sena Empresa son: Apicultura, Avicultura, Especies Menores, Ganadería, Laboratorio de Reproducción Animal, Ovinos, Piscicultura y Porcinos.La Sena empresa Agroindustria, desarrolla diferentes proyectos para hacer las practicas requeridas de las especialidades de Producción Agroindustria, Control y Calidad y otras especialidades que tienen competencias en estas áreas. Las unidades que actualmente maneja el proceso Sena Empresa son las plantas de: Aguas, Almacén, Cárnicos, Control y Calidad, Frutas, Lácteos y Panificación.La Sena empresa Gestión, desarrolla diferentes proyectos para hacer las practicas requeridas de las especialidades de Administración de Empresas Agropecuarias. Las Divisiones que actualmente maneja el proceso Sena Empresa son: Gerente Administrativo y Líder del Sistema de Gestión de la Calidad, Gerente Técnico y Lideres de Producción (Agrícola, Pecuaria, Agroindustria, Mecanización), Líder de Talento Humano y sus Gestores de Talento Humano (Agrícola, Pecuaria, Agroindustria, Mecanización), Líder de Contabilidad y Finanzas, Líder de Mercadeo y De Ventas.",
      imageWidth: 200,
      imageHeight: 200,
      width: 1200,
      imageAlt: "logo sena empresa",
      confirmButtonColor: "#28a745",
      showCloseButton: true,
      cancelButtonText: `
      <i class="fa fa-thumbs-down"></i>`,
    });
  });

// funcion para mostrar el organigrama de sena empresa
document
  .getElementById("mostrarOrganigrama")
  .addEventListener("click", function (event) {
    event.preventDefault();

    Swal.fire({
      imageUrl: "https://i.ibb.co/C2mTy7G/DT30720-GE-ORGANIGRAMA.jpg",
      imageWidth: 800,
      imageHeight: 600,
      imageAlt: "logo sena empresa",
      confirmButtonColor: "#28a745",
      width: 1000,
      showCloseButton: true,
      cancelButtonText: `
      <i class="fa fa-thumbs-down"></i>`,
    });
  });
