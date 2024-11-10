Trabajo Especial Tercera entrega.
Integrantes:
Rodriguez, Rocio Gisele DNI:35418532
Chaile, Gisele DNI:35333906


Descripción del TPE
Biblioteca virtual donde se relacionan dos tablas (libros-genero) mediante el género de cada libro.

URL de Ejemplo
tpe3-api-rest/api/libros



Diagrama de tablas 
![Captura web_20-10-2024_193820_localhost](https://github.com/user-attachments/assets/0aafb821-8f59-4bb9-97d6-47098f9dc0fc)

Libros

GET 
tpe3-api-rest/api/libros
Devuelve todos los libros cargados en la base de datos, odenados por el ID genero

GET 

tpe3-api-rest/api/libros/:ID
Devuelve el libro correspondiente al ID solicitado.

POST

tpe3-api-rest/api/libros
Inserta un nuevo libro con los datos proporcionados en el cuerpo de la solicitud (en formato JSON).


Campos requeridos:
  Titulo: Titulo del libro
  Autor: Autor del libro
  Reseña: Reseña del libro
  Año: Año de publicacion del libro
  ID_genero: genero del libro
  

Ejemplo de json a insertar:
      {
        "Titulo": "Nuevo Título",
        "Autor": "Nuevo Autor",
        "Reseña": "Nueva Reseña",
        "Año": 2023,
        "ID_genero": 3
      }

PUT tpe3-api-rest/api/libros/:ID

Modifica el libro que corresponde al ID solicitado. La información a modificar se envía en el cuerpo de la solicitud (en formato JSON).

Campos que se pueden modificar:
  Titulo
  Autor
  Reseña
  Año
  ID_genero




