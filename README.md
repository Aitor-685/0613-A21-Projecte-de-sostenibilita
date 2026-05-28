# 0613-A21-Projecte-de-sostenibilita

Proyecto web de sostenibilidad que presenta productos alineados con la economía circular y el ODS 11: Ciudades y comunidades sostenibles.

## Qué ofrece la página

- Página principal con información sobre comunidades sostenibles, ODS 11 y la filosofía del proyecto.
- Sección de productos donde se muestran artículos relacionados con la sostenibilidad urbana.
- Filtros dinámicos en frontend para buscar productos por categoría, precio y valoración.
- Login para usuarios con rol `admin` que permite gestionar contenido.
- Gestión de productos con las operaciones CRUD: crear, editar y eliminar.
- Gestión de categorías y usuarios (menú preparado para acceder a estas secciones).

## Cómo funciona

- JavaScript (`js/filtres.js`) se encarga de:
  - cargar los productos desde la API de PHP
  - aplicar filtros al instante
  - renderizar la lista de productos en la página.
- PHP se encarga de:
  - manejar la base de datos SQLite
  - servir vistas y formularios
  - procesar crear/editar/eliminar productos en `controller/productes/`
  - gestionar login y permisos de administrador.

## Cómo funcionan las peticiones

- La página `view/products.php` carga el HTML y el JavaScript.
- El script `js/filtres.js` hace peticiones `fetch` a `api/productes.php` para obtener JSON con los productos y categorías.
- Cuando el usuario aplica filtros, el JavaScript filtra los productos ya cargados sin pedir más datos al servidor.
- Para crear, editar o eliminar un producto, el formulario envía un `POST` a `/controller/productes/router.php`.
- `controller/productes/router.php` recibe la petición y la redirige a `crear.php`, `editar.php` o `eliminar.php` según `accion`.
- Esos scripts PHP usan `controller/connecio.php` para acceder a la base de datos SQLite y guardan los cambios.
- Después de cada acción, el servidor redirige de nuevo a `view/products.php` con un parámetro `ok` o `error` para mostrar el resultado.

## Estructura del proyecto

- `index.php` — portada del proyecto con la presentación de la idea sostenible.
- `view/products.php` — lista pública de productos y acceso a la gestión si eres admin.
- `view/editarProducts.php` — formulario dedicado para editar productos.
- `api/productes.php` — API que devuelve datos de productos y categorías.
- `controller/productes/crear.php` — procesa la creación de productos.
- `controller/productes/editar.php` — procesa la edición de productos.
- `controller/productes/eliminar.php` — procesa la eliminación de productos.
- `controller/connecio.php` — conexión reutilizable a SQLite.
- `data_base/` — contiene la base de datos SQLite y el SQL inicial para la importación.
- `styles/estilo.css` — diseño y estilos de la página.
- `js/grafics.js` — scripts para gráficos de sostenibilidad.
