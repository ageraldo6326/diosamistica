# SDD 01 · Landing de Diosa Mística

**Versión 1.0 · Especificación para implementar en Laravel 12, Blade y Livewire.**  
**Referencia visual:** captura adjunta de Stitch (`screen.png`). Mantenerla junto al SDD al pasarlo al agente de código.

## Objetivo y alcance

Crear la página pública de ventas en `/` para visitantes que llegan desde YouTube. La portada debe invitar a obtener una lectura gratuita y anticipar la experiencia mediante una tirada simbólica interactiva. El ambiente debe sentirse nocturno, íntimo y elegante.

Esta fase entrega diseño responsive, navegación, formulario visual y una demostración de cartas. Correo, generación de PIN, autenticación requerida para la consulta real, IA, consumo de tokens, pagos y reservas reales se implementarán en fases posteriores. La demo usa contenido local de muestra y nunca simula haber enviado un correo ni confirmado una compra.

## Requisitos de diseño

| ID | Sección | Especificación |
|---|---|---|
| UI-01 | Cabecera | Marca con media luna, navegación anclada y botón «Iniciar lectura» que lleva al formulario. En móvil, mostrar marca, acción principal y menú compacto accesible. |
| UI-02 | Portada | Dos columnas en escritorio. A la izquierda «Elige una carta del Cosmos», descripción y CTA dorado «Obtener mi lectura gratis», con «Una lectura por correo verificado» debajo. A la derecha, una baraja en abanico con una carta central dominante. Debajo del CTA, dos accesos secundarios a sesión en vivo y paquetes virtuales. En móvil, priorizar titular y CTA antes de la ilustración. |
| UI-03 | Cómo funciona | Tres pasos visuales: registro, verificación del correo y acceso por PIN. Apilar en móvil y conservar los encabezados numerados de la referencia. |
| UI-04 | Formulario | Panel centrado con nombre completo y correo. Etiquetas persistentes, mensajes de error junto al campo y confirmación explícita de que se trata de un prototipo. Mantener la interacción local, sin guardar ni enviar datos. Ofrecer «Probar la tirada de muestra» como acción separada. |
| UI-05 | Tirada tríptica | Tres cartas boca abajo: Pasado, Presente y Horizonte. Cada carta se revela por separado y muestra nombre, interpretación breve y una pregunta para reflexionar. Etiquetar «Tirada de muestra». |
| UI-06 | Paquetes | Tres tarjetas comparables y una destacada con un borde dorado. Mantener la jerarquía de la captura. Usar «Precio por definir» y omitir beneficios sin validar. |
| UI-07 | Sesión en vivo | Panel con explicación de la sesión a la izquierda y módulo de horarios a la derecha. Mostrar «Horarios por publicar» mientras no exista agenda conectada. |
| UI-08 | Pie | Marca, enlaces que apunten a secciones existentes y aviso breve sobre lectura simbólica. Incluir enlaces de soporte y legales cuando sus destinos estén definidos. |

### Dirección visual

- Fondo azul tinta `#0D1024`, secciones alternas `#12162C`, paneles `#191D35`, marfil `#F4EBE0`, oro `#F4CB8D` y lavanda `#D8C1FA`. Son valores propuestos a partir de la captura.
- Serif editorial para titulares, como Cormorant Garamond, y sans legible para formularios y acciones, como DM Sans. Reservar mayúsculas espaciadas para etiquetas breves.
- Separadores finos con motivos celestes, halo suave detrás de la baraja y sombras discretas. Mantener amplio espacio entre secciones. Usar arte separado de los textos y controles HTML.
- Validar anchos de 360, 390, 768 y 1440 px. Evitar scroll horizontal, letra diminuta y elementos superpuestos. Mantener contraste AA, foco visible y controles táctiles de al menos 44 px.

## Movimiento e interacción

| ID | Evento | Comportamiento |
|---|---|---|
| MX-01 | Carga de portada | Aparición en 350 ms con leve desplazamiento y opacidad. El halo detrás de la baraja puede pulsar suavemente durante 5 s y quedar fijo. El CTA es usable desde el inicio. |
| MX-02 | CTA principal | Desplazar al formulario y mover el foco a su encabezado. Mantener el destino visible por debajo de la cabecera. |
| MX-03 | Revelar carta | Pulsar, tocar o usar Enter/Espacio. Volteo 3D de unos 520 ms. Mostrar la interpretación debajo sin saltos bruscos de la página. La carta queda revelada hasta seleccionar «Reiniciar tirada». Ignorar pulsaciones repetidas durante el giro. |
| MX-04 | Movimiento reducido | Con `prefers-reduced-motion`, desactivar deriva, transiciones de entrada, desplazamiento suave y volteo. Mostrar la misma información de inmediato. |

Usar CSS para movimiento y un controlador pequeño de Alpine o JavaScript para la selección, según las dependencias del starter kit existente. Evitar una petición al servidor por cada giro. Mantener el foco sobre la carta y anunciar el resultado mediante una región viva discreta. El efecto debe funcionar también sin hover.

## Implementación propuesta

1. Revisar el repositorio Laravel 12 y ubicar la ruta pública, el layout y el CSS del starter kit. Implementar la landing en Blade con secciones y componentes reutilizables, preservando las rutas existentes de autenticación.
2. Definir tokens visuales y construir primero la portada móvil. Completar secciones y adaptar el layout a escritorio.
3. Implementar el estado local del formulario y la tirada. Mantener la landing en Blade y reservar Livewire para el momento en que haya comportamiento de servidor que integrar.
4. Optimizar las ilustraciones en WebP o AVIF, definir sus dimensiones y cargar de forma diferida las imágenes debajo de la portada. Animar transformaciones y opacidad sin bloquear la lectura.
5. Revisar capturas móvil/escritorio junto a `screen.png` y probar navegación, formulario, tirada, teclado y movimiento reducido.

## Criterios de aceptación

- [ ] `/` abre la landing y las rutas de autenticación siguen funcionando.
- [ ] A 390 px, el titular, la oferta y el CTA principal se ven sin desplazarse en un viewport de 390 × 844.
- [ ] Los enlaces de la cabecera y la portada llevan a secciones reales. El formulario indica qué hacer ante nombre vacío o correo inválido y distingue la demo de una activación real.
- [ ] Cada carta se puede revelar con toque, clic y teclado. La interpretación permanece legible, el giro no se duplica y «Reiniciar tirada» devuelve las cartas a su estado inicial.
- [ ] Con movimiento reducido, se completa el mismo recorrido con cambios instantáneos.
- [ ] En los cuatro anchos de prueba no hay desbordamiento ni texto que se pierda sobre el arte. El build de frontend finaliza correctamente.
- [ ] Los precios, horarios y beneficios de la captura se tratan como datos ilustrativos hasta que el negocio los apruebe.

## Skills recomendadas para el agente que implemente el SDD

| Prioridad | Skill o especialidad | Uso en este proyecto |
|---|---|---|
| 1 | Diseño frontend responsive | Convertir la captura de Stitch en una interfaz usable. Afinar jerarquía, tipografía, espacios y portada móvil. |
| 2 | Laravel + Blade + Livewire | Revisar convenciones del repositorio, crear vistas y componentes y conservar el starter kit. Incorporar reglas de servidor en fases posteriores. |
| 3 | Animación CSS + accesibilidad | Implementar el giro de cartas, el foco, la navegación con teclado y la alternativa con movimiento reducido. |
| Opcional | Generación de imágenes | Crear dorsos de cartas y ornamentos originales si faltan assets exportables de Stitch. |

Si no tienes una skill Laravel/Livewire instalada, usa este SDD como instrucción del agente y registra únicamente las convenciones estables del repositorio en `AGENTS.md`. Mantén las tareas y criterios de esta landing en el SDD.
