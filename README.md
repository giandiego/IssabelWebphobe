# Instrucciones para la instalación y configuración del módulo Webphone en Issabel

Este script automatiza la instalación y configuración del módulo Webphone en la plataforma Issabel. Sigue los pasos a continuación para utilizarlo:

## Requisitos previos

Asegúrate de cumplir con los siguientes requisitos antes de ejecutar el script:

- Tener acceso de administrador a la plataforma Issabel.
- Tener instalado SQLite3 en el servidor de Issabel.
- Descargar el contenido del repositorio y descomprimirlo en una ubicación de tu elección.

## Descarga del repositorio

1. Abre una terminal en el servidor de Issabel.
2. Navega hasta el directorio `/opt/`
3. Clona el repositorio ejecutando el siguiente comando:

```bash
cd /opt/
git clone https://github.com/giandiego/IssabelWebphobe.git
```

4. Accede al directorio del repositorio:

```bash
cd IssabelWebphobe/
```

## Configuración de la base de datos

Antes de ejecutar el script, asegúrate de tener un usuario `webphone` creado en la base de datos de Issabel con permisos únicamente para la base de datos `asterisk`. Sigue estos pasos para crear el usuario:

1.  Abre una terminal en el servidor de Issabel.
2.  Ejecuta el siguiente comando para iniciar la consola de MySQL:

```bash
mysql -p
```

3.  Ingresa la contraseña del usuario root de MySQL cuando se te solicite.
4.  Ejecuta el siguiente comando en la consola de MySQL para crear el usuario `webphone` con permisos solo para la base de datos `asterisk`:

```sql
CREATE USER 'webphone'@'localhost' IDENTIFIED BY 'tu_contrasena';
GRANT ALL PRIVILEGES ON asterisk.* TO 'webphone'@'localhost';
FLUSH PRIVILEGES;
EXIT;

```

Asegúrate de reemplazar `'tu_contraseña'` con la contraseña que desees utilizar para el usuario `webphone`.


## Pasos de instalación

1. Abre una terminal en el servidor de Issabel.
2. Navega hasta el directorio donde descomprimiste el contenido del repositorio.
3. Ejecuta el siguiente comando para iniciar la instalación:

```bash
cd /opt/IssabelWebphobe/
sh install.sh
```

4. El script realizará las siguientes acciones:
    
    -   Agregará elementos al menú de Issabel.
    -   Insertará entradas en las bases de datos `menu.db` y `acl.db`.
    -   Copiará los archivos necesarios a las ubicaciones correspondientes.

## Configuración de la extensión WebRTC

Después de ejecutar el script, sigue estos pasos para configurar una extensión WebRTC en Issabel y asignarla a un usuario:

1.  Accede a la interfaz web de administración de Issabel utilizando tu navegador.
2.  Inicia sesión con las credenciales de administrador.
3.  Navega hasta la sección de administración de extensiones o usuarios.
4.  Crea una nueva extensión WebRTC para el usuario deseado. Consulta la documentación de Issabel para obtener instrucciones detalladas sobre cómo hacerlo.
5.  Asigna la extensión WebRTC al usuario específico.

¡Listo! Ahora los usuarios podrán utilizar el módulo Webphone en Issabel a través de la extensión WebRTC que has configurado.

## Autor

Este módulo Webphone para Issabel ha sido desarrollado por **Gian Diego Javes Lecca**.

- Email: gjaves.tnegocios@gmail.com

## Agradecimientos

Este módulo está basado en el proyecto [jssip-phone-client](https://github.com/kstoqnov/jssip-phone-client). Agradecemos a su creador por su contribución.

---

¡Espero que esto te sea útil! Si tienes alguna pregunta adicional, no dudes en hacerla.
