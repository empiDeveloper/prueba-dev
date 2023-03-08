<p><strong>Instrucciones de uso.</strong></p>
<br/>
1- Clonar repositorio.
<br/>
2- Una vez clonado el repo, en una consola iniciamos el servidor. comando -> php artisan serve.
<br/>
3- Probar ENDPOINTS:
<br/>
  3.1: ENDPOINT para consultar una ciudad:
  <br/>
     - URL: http://127.0.0.1:8000/api/location/search?query=bucaramanga&api=3fecaa1c1c60ac88a8234a412a0dce3a
     <br/>
     - <strong>Parámetros que recibe:</strong>
     <br/>
       - <strong>query:</strong> nombre de la ciudad, Ejemplo: "Bucaramanga"
       <br/>
       - <strong>api:</strong> la llave para conectarnos a la api, API: "3fecaa1c1c60ac88a8234a412a0dce3a"
       <br/>
  3.2: ENDPOINT para consultar el historial de búsquedas:
  <br/>
     - URL: http://127.0.0.1:8000/api/location/history
   
