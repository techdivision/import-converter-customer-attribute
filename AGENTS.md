# AGENTS.md - import-converter-customer-attribute

## Zweck & Verantwortung

Das `import-converter-customer-attribute` Modul bietet **Customer CSV zu Attribute Option CSV Konvertierung**. Es ist ein **Tier 5 Modul** und erweitert `import-converter`.

**Hauptverantwortung:**
- Transformation von Customer CSV zu Attribute Option CSV
- Observer Pattern für Konvertierungs-Hooks
- Event-Driven für Konvertierungs-Prozesse
- Listener für Custom Processing

## Architektur & Design Patterns

### Kern-Klassen
- **CustomerAttributeConverter**: Haupt-Converter-Klasse
- **CustomerAttributeConverterObserver**: Observer für Hooks
- **CustomerAttributeConverterListener**: Listener für Events

### Verwendete Patterns
- **Observer Pattern**: Für Konvertierungs-Hooks
- **Event-Driven**: Für Konvertierungs-Prozesse
- **Strategy Pattern**: Verschiedene Konvertierungs-Strategien

## Abhängigkeiten

### Externe Pakete
- **Keine**

### TechDivision Dependencies
- **import-customer** ^18.1 - Customer Importer
- **import-attribute** ^23.1 - Attribute Importer
- **import-converter** ^12.0 - Converter Framework

### Abhängig von diesem Modul (1 Reverse Dependency)
- **import-cli-simple** - Master CLI

## Wichtige Entry Points

### Converter Klassen
```php
// Customer Attribute Converter
CustomerAttributeConverter::convert($row): array
CustomerAttributeConverter::getSubject(): SubjectInterface

// Converter Observer
CustomerAttributeConverterObserver::handle($row): void
```

## Events & Extension Points

### Events
- **BeforeConversionEvent**: Vor Konvertierung
- **AfterConversionEvent**: Nach Konvertierung

### Listeners
- **ConversionListener**: Für Custom Processing

## Hints für KI-Agenten

### Wichtig zu verstehen
1. **Tier 5 Modul**: Erweitert Converter Framework
2. **Konvertierungs-fokussiert**: Customer → Attribute Option CSV
3. **Observer Pattern**: Für Hooks
4. **Event-Driven**: Für Konvertierungs-Prozesse

## Bekannte Einschränkungen

- **Customer-Attribute-Only**: Nur für Customer Attributes
- **CSV-Only**: Nur CSV-Format unterstützt

## Zusammenfassung

`import-converter-customer-attribute` ist ein **Tier 5 Modul**, das Customer CSV zu Attribute Option CSV Konvertierung bietet. Es erweitert den Converter Framework mit spezialisierter Funktionalität.

**Für Agenten:** Verstehe dieses Modul als **Customer Attribute Converter** mit Observer und Event-Driven Architektur.
