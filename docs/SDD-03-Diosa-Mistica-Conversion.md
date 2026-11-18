# SDD 03 · Ganchos, copy y CTA de Diosa Mística

**Versión 1.0 · Laravel 12 · Landing pública**

Este incremento modifica el orden y la presentación comercial del SDD 02. El objetivo es que los visitantes de YouTube y TikTok encuentren el precio y puedan elegir una lectura sin pasar por el formulario de demostración.

## Orden y copy de la landing

| Orden | Sección | Contenido y acción |
|---|---|---|
| 1 | Portada con cartas | **Lecturas de tarot con Diosa Mística**. «Explora lo que te inquieta con una lectura simbólica. Elige el formato que más te sirva, desde US$20». CTA principal dorado **Ver lecturas y precios** → `#servicios`. Enlace secundario **Probar una tirada de muestra** → `#tirada`. |
| 2 | Servicios y precios | Título **Elige tu lectura**. «Una sesión en vivo, una pregunta puntual o atención prioritaria». Mostrar las tres tarjetas en el orden indicado abajo. |
| 3 | Quién realiza la lectura | Título **Conoce a Diosa Mística**. «En la lectura general conversas directamente con Diosa Mística por Google Meet». Usar foto o video de la titular solo si está disponible y autorizado. |
| 4 | Tirada de muestra | Título **Elige una carta del cosmos**. «Toca una carta y descubre una pregunta para reflexionar». Acceso directo, sin formulario. Después de revelar una carta, mostrar **Ver lecturas y precios** → `#servicios`. |
| 5 | Preguntas frecuentes y cierre | Aclarar quién atiende, cómo funciona la lectura general y el estado de las reservas. Cierre **Encuentra la lectura que mejor se ajusta a lo que buscas** con botón **Ver lecturas y precios** → `#servicios`. |

## Copy de las opciones

| Orden | Servicio | Precio | Gancho | Texto de tarjeta | CTA |
|---|---|---:|---|---|---|
| 1 | **Lectura general** | **US$87** | Un espacio para explorar lo que te preocupa. | Sesión en vivo de 20 a 25 minutos con Diosa Mística por Google Meet. Conversa sobre el tema que quieres explorar. | Elegir lectura general |
| 2 | **Lectura de una sola pregunta** | **US$20** | Una pregunta, toda la atención en ese tema. | Una lectura simbólica enfocada en una sola pregunta. | Elegir una pregunta |
| 3 | **Lectura de emergencia** | **US$120** | Atención prioritaria para una consulta de tarot. | Elige esta opción si buscas una lectura prioritaria. Disponibilidad por confirmar. | Elegir lectura prioritaria |

Destacar la lectura general con un borde dorado y la etiqueta «Sesión en vivo». Mantener los precios al mismo nivel visual en las tres tarjetas. El plazo de 48 horas queda documentado en el SDD 02. Publicarlo cuando se defina desde qué momento cuenta y si incluye fines de semana y feriados. La modalidad y los plazos de las otras lecturas quedan sujetos a confirmación.

## Comportamiento del CTA

- **Portada:** botón lleno y de alto contraste, visible desde el primer vistazo en móvil. Usar el nivel secundario para la muestra.
- **Móvil:** mostrar una barra inferior «Ver lecturas y precios» cuando la portada quede fuera de pantalla. Ocultarla mientras el catálogo, el resumen de selección o el CTA de cierre estén visibles. Respetar el área segura del dispositivo.
- **Catálogo:** cada botón actualiza un resumen local con el servicio y el precio. Mostrar **«Reservas en línea próximamente»** y permitir cambiar la selección. El CTA expresa elección, sin prometer que ya se puede reservar o pagar.
- **Preguntas frecuentes:** «¿Quién me atiende?» especifica que la lectura general la realiza Diosa Mística. «¿Cómo podré pagar?» presenta PayPal y transferencias a Banco BHD, Banco Popular o Banreservas como métodos previstos. No publicar enlaces de cobro.
- Retirar enlaces al formulario de activación de la demo del recorrido principal. La muestra puede seguir funcionando desde su propio ancla sin pedir datos.

## Animaciones

| Momento | Efecto | Parámetros |
|---|---|---|
| Entrada | La baraja se abre en abanico y aparece un halo detrás de la carta central. | Una vez, 500–650 ms. Texto y CTA visibles e interactivos desde el inicio. |
| CTA principal | Se ilumina el contorno y avanza ligeramente el icono al recibir foco o al pasar el cursor. El toque muestra una respuesta breve de presión. | 160–220 ms. Un solo destello opcional al cargar. Sin pulsación continua. |
| Entrada al catálogo | Las tarjetas aparecen con un desplazamiento corto, en el orden de lectura. | 240–320 ms por tarjeta, con desfase de 60 ms. El contenido queda visible si falla JavaScript. |
| Carta de muestra | La carta gira, revela su ilustración y aparece la reflexión. Debajo se presenta el CTA de regreso al catálogo. | Giro de 450–550 ms, activado por clic, toque, Enter o Espacio. Sin desplazamiento automático. |

Animar principalmente transformación y opacidad. Mantener el espacio reservado para evitar saltos de diseño. Con `prefers-reduced-motion`, omitir giros, destellos y desplazamiento suave. Conservar la misma información y acciones con actualización instantánea. Mover el foco al encabezado del catálogo al navegar desde un CTA y anunciar la selección en una región de estado.

## Implementación y verificación

1. Reordenar la vista Blade de la landing y reutilizar los datos de servicios del SDD 02. Centralizar las descripciones junto a los precios e identificadores.
2. Actualizar anclas, menú, botones y estado local. Reutilizar el JavaScript y CSS existentes. Evitar nuevas dependencias de animación.
3. Revisar móvil a 360 y 390 px y escritorio. Confirmar portada, catálogo y selección con toque y teclado, y repetir con movimiento reducido.
4. Verificar que los tres importes aparezcan en USD, que la FAQ coincida con el catálogo y que el build de frontend finalice.
5. Para evaluar después de publicar, distinguir clics en el CTA principal y selecciones por servicio. La selección indica interés. La conversión a venta se medirá cuando exista un pedido con pago confirmado.

**Alcance:** cambios de landing, copy, selección en pantalla y animación. Pagos, agenda, reservas, automatizaciones e integración de IA quedan fuera de este incremento.
