# Apipandedios README - Panadería App

¡Bienvenido a Pan de Dios! Esta aplicación te permite registrar pedidos de panes de manera fácil y rápida.

### Instalación

1. Clona este repositorio en tu máquina local utilizando el comando:

```
git clone 'https://github.com/ADSOJAVIERCAMPOS/Apipandedios.git'

Cambia a la rama master, la cual contiene el codigo de desarrollo de la API, con:
git checkout master
```

2. Instala las dependencias necesarias y configura la conexión a la base de datos.

    Guardar la carpeta del repositorio de la API, dentro de la carpeta htdocs del servidor local
    Crea una base de datos llamada pandedios e importa el archivo pandedios.sql dentro de el repositorio de la API
    y en la carpeta base-datos
### Uso

Una vez que la aplicación esté instalada y configurada, puedes iniciar el servidor y acceder a los siguientes endpoints:

- **Clientes:** `http://localhost/ApiPandedios/clientes`
- **Producto:** `http://localhost/ApiPandedios/producto.php`
- **Pedido:** `http://localhost/ApiPandedios/pedido.php`

### Endpoints API

Además de los endpoints mencionados, la Panadería App cuenta con los siguientes endpoints API para gestionar los pedidos de pan:

1. **GET /api/panes**: Obtiene todos los tipos de panes disponibles en la panadería.

2. **GET /api/pedidos**: Obtiene todos los pedidos realizados en la panadería.

3. **POST /api/pedidos**: Crea un nuevo pedido de pan.

4. **PUT /api/pedidos/:id**: Actualiza un pedido existente.

5. **DELETE /api/pedidos/:id**: Elimina un pedido existente.



¡Gracias por usar Pan de Dios! Que disfrutes de tus deliciosos panes frescos.7