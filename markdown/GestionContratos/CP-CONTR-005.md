# Casos de Prueba | Gestión de Contratos

## ID caso de prueba
CP-CONTR-005

## Título de la prueba
Validación de datos obligatorios del contrato

## Módulo / Característica
Gestión de Contratos - Validación

## Descripción
Verificar que el sistema valide los campos obligatorios al crear un contrato.

## Precondiciones
- Usuario autenticado.
- Usuario en el formulario de nuevo contrato.

## Pasos para la ejecución
1. Acceder al formulario de nuevo contrato.
2. Dejar los campos vacíos.
3. Intentar guardar el contrato.

## Resultado esperado
- El sistema muestra mensajes de validación.
- El contrato no se guarda.
