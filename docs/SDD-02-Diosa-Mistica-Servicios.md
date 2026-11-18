# SDD 02 · Catálogo de servicios de Diosa Mística

**Versión 1.0 · Laravel 12 · Landing pública**

## Objetivo

Permitir que una persona que llega desde YouTube o TikTok conozca las tres lecturas, compare sus precios en dólares y elija la que le interesa sin conversar con la operadora. Este incremento entrega el catálogo y la selección visual en la landing existente. La selección no genera pedido, cobro ni reserva.

## Catálogo y texto público

| Identificador | Servicio | Precio | Información que se muestra |
|---|---|---:|---|
| general | Lectura general | US$87 | Sesión en vivo con Diosa Mística por Google Meet. Duración de 20 a 25 minutos. |
| emergencia | Lectura de emergencia | US$120 | Servicio prioritario. Mostrar «Disponibilidad por confirmar» mientras se define cómo se cuentan las 48 horas. |
| una-pregunta | Lectura de una sola pregunta | US$20 | Lectura enfocada en una sola pregunta. |

**Regla comercial informada para emergencia.** La operadora indicó que se realiza dentro de las 48 horas posteriores al pago. Antes de publicar el plazo como promesa al cliente, confirmar si empieza al enviar el pago o al verificarlo, y si incluye fines de semana y feriados. La duración y el medio de entrega de esta lectura quedan pendientes.

**Regla para una sola pregunta.** No atribuirle una duración, plazo de respuesta ni medio de entrega hasta que se definan. Tampoco identificarla como una consulta de IA.

## Requisitos de la landing

1. Agregar una sección «Servicios de lectura» con el ancla `#servicios`. En la portada y la navegación, dar acceso visible mediante «Ver servicios y precios». El visitante puede ir directamente al catálogo.
2. Mostrar primero la lectura general, seguida por emergencia y una sola pregunta. Cada tarjeta muestra nombre, precio, descripción y el botón «Elegir esta lectura». Mantener la estética, tipografía y espaciado de la landing.
3. Al elegir una tarjeta, indicar cuál se seleccionó y mostrar un resumen con nombre y precio, acompañado de «Reservas en línea próximamente». Permitir cambiar de servicio. Evitar botones de pago o reserva que aparenten completar una operación. No abrir WhatsApp o un chat como condición para seleccionar.
4. Retirar del escaparate los paquetes virtuales de demostración con «Precio por definir» y actualizar sus enlaces de navegación. La tirada de muestra puede seguir como experiencia separada, identificada como demostración. Si el bloque antiguo de agenda conserva una acción de reserva, redirigir esa acción a «Ver servicios y precios» y retirar cualquier indicación de cupos disponibles.
5. Si se muestran medios de pago, usar la leyenda «Métodos previstos para las reservas: PayPal y transferencias a Banco BHD, Banco Popular o Banreservas». Mantenerla informativa, sin instrucciones de depósito ni enlaces de cobro.

## Implementación

- Trabajar en la ruta pública `/` del repositorio existente. Revisar `routes/web.php` y `resources/views/welcome.blade.php` y reutilizar los estilos y componentes de la landing.
- Mantener los tres servicios en una sola estructura de datos versionada, por ejemplo `config/lecturas.php`, y renderizar las tarjetas con Blade. Guardar precios en centavos enteros (8700, 12000 y 2000) con moneda USD.
- Implementar la selección como estado local con el JavaScript existente. Usar botones accesibles por teclado y anunciar el resumen actualizado con una región de estado. No solicitar datos personales ni persistir la selección.
- Mostrar una columna en móvil y hasta tres en escritorio. Probar la lectura de los precios, el foco visible y el funcionamiento del ancla desde el menú móvil.

## Fuera de alcance

Calendario y cupos, horarios y zonas horarias en la interfaz, pagos reales, comprobantes, verificación de ingresos, reservas, Google Meet automático, avisos, panel administrativo, integración de IA y automatización. Google Meet se menciona como modalidad de la lectura general.

## Criterios de aceptación

- [ ] La landing muestra exactamente **Lectura general · US$87**, **Lectura de emergencia · US$120** y **Lectura de una sola pregunta · US$20**.
- [ ] La lectura general indica **20 a 25 minutos** y **Google Meet**. La emergencia indica «Disponibilidad por confirmar». La lectura de una pregunta se describe sin inventar condiciones.
- [ ] Se puede llegar al catálogo desde portada y navegación en móvil y escritorio. Los enlaces antiguos no apuntan a secciones retiradas.
- [ ] Al seleccionar o cambiar un servicio con toque, clic o teclado, se actualiza su nombre y precio, y se muestra «Reservas en línea próximamente».
- [ ] Ninguna selección crea una reserva, cobra, pide datos ni requiere chat. No aparecen paquetes ficticios como ofertas vigentes.
- [ ] La landing se verifica en móvil y escritorio, y el build de frontend termina correctamente.
