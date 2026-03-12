# Casos de Prueba | Gestión de Prórrogas

## ID caso de prueba
CP-PROR-005

## Título de la prueba
Validación de campos obligatorios

## Módulo / Característica
Gestión de Prórrogas - Validación

## Descripción
Verificar que el sistema valide los campos obligatorios del formulario de prórroga.

## Precondiciones
- Usuario autenticado.
- Usuario en formulario de prórroga.

## Pasos para la ejecución
1. Acceder al formulario.
2. No ingresar datos.
3. Intentar guardar.

## Resultado esperado
- El sistema muestra mensajes de validación.
- La prórroga no se guarda.
