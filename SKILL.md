---
name: aka-wireframe-wp
description: Build complete WordPress authority sites (200+ pages) using the Authority-Knowledge-Answer (AKA) content framework. Use when the user wants to create large-scale WordPress sites with topical clustering, programmatic content generation, SEO optimization, or mentions "AKA framework", "authority site", "topical authority", "content hub", "pillar content", "200 page site", or "wireframe WordPress".
---

# AKA Wireframe WordPress

Build complete WordPress authority sites automatically using the Authority-Knowledge-Answer (AKA) content framework. Generate 200+ page sites with proper topical clustering, internal linking, and SEO optimization.

**Generate in 1-2 hours what typically takes 4-6 weeks manually.**

## The AKA Framework

```
Authority Pages (5-7 hubs)
├── 4,000 words, comprehensive guides
├── Head keywords, hub for all related content
│
├── Knowledge Pages (12-15 per hub)
│   ├── 2,000 words, deep-dive content
│   ├── Mid-tail keywords
│   └── Specific topics and solutions
│
└── Answer Pages (20-30 per hub)
    ├── 1,000 words, FAQ format
    ├── Long-tail questions
    └── Featured snippet optimized
```

## Output Per Hub (~20 minutes)
- 1 Authority page (4,000 words)
- 15 Knowledge pages (30,000 words)
- 25 Answer pages (25,000 words)
- 300+ internal links
- Complete SEO optimization

## Full Site (5 hubs, 1-2 hours)
- 5 Authority hubs
- 75 Knowledge pages
- 125 Answer pages
- **205 total pages**
- 1,500+ internal links

## Quick Start Workflow

### Step 1: Setup (5 min)
Collect 15 business variables:
1. Business name
2. Industry
3. Location (City, State)
4. Service radius
5. Primary service (→ first Authority Hub)
6. Secondary services (→ more Authority Hubs)
7. Target audience
8. Top 3 pain points
9. Brand voice
10. Unique value proposition
11. Phone number
12. Email
13. Business address
14. Hours of operation
15. Trust signals (years, clients, awards)

Save to: `.factory/config/aka-wireframe/business-config.json`

### Step 2: Generate Strategy (2 min)
Create complete AKA wireframe:
- 5-7 Authority Hub topics
- 12-15 Knowledge pages per hub
- 20-30 Answer questions per hub
- Complete URL structure
- Keyword mapping

Save to: `.factory/config/aka-wireframe/aka-strategy-output.json`

### Step 3: Generate Content (8 min/hub)
Create all content with variable injection:
- Authority page (4,000 words)
- Knowledge pages (15 × 2,000 words)
- Answer pages (25 × 1,000 words)
- Add `[LINK:slug|anchor]` placeholders

Save to: `generated-content/hub-N/`

### Step 4: Process Internal Links (2 min/hub)
- Convert `[LINK:...]` placeholders to URLs
- Add AI contextual links
- Validate AKA structure
- No broken links, no orphans

### Step 5: Deploy to WordPress (3 min/hub)
- Create pages with hierarchy
- Set parent-child relationships
- Add SEO metadata
- Insert schema markup
- Create navigation menus

## Reference Files

For detailed implementation, load these references as needed:

| Reference | When to Load |
|-----------|--------------|
| `references/orchestrator.md` | Coordinating full workflow |
| `references/strategy-planner.md` | Generating AKA strategy |
| `references/content-generator.md` | Creating page content |
| `references/internal-linker.md` | Processing links |
| `references/wordpress-deployer.md` | Deploying to WordPress |
| `references/seo-optimizer.md` | SEO auditing |

## Industry Applications

Works for any vertical:
- **Law Firms**: Personal injury, family law, criminal defense
- **Financial Services**: Title loans, mortgages, insurance
- **Home Services**: HVAC, plumbing, roofing, landscaping
- **Healthcare**: Medical practices, dental, chiropractic
- **Professional Services**: Consulting, real estate, agencies

## Content Structure Example

**HVAC Company - Hub 1: AC Repair**

```
ac-repair-services/ (Authority - 4,000 words)
├── ac-not-cooling/ (Knowledge)
├── ac-making-noise/ (Knowledge)
├── ac-refrigerant-leak/ (Knowledge)
├── ...15 Knowledge pages
├── how-much-ac-repair-cost/ (Answer)
├── why-ac-blowing-warm-air/ (Answer)
├── when-replace-vs-repair-ac/ (Answer)
└── ...25 Answer pages
```

## Key Principles

1. **Variable Injection**: All content uses `{{BUSINESS_NAME}}`, `{{LOCATION}}`, etc.
2. **Two-Phase Linking**: Placeholders first, then conversion + AI contextual links
3. **SEO-First**: Every page has title, meta, schema, keywords mapped
4. **Hierarchy**: Proper parent-child relationships for Google
5. **No Orphans**: Every page linked from multiple sources

## WordPress Requirements

- WordPress REST API enabled
- Application passwords or admin credentials
- Permalinks set to `/%postname%/`
- AKA Framework Theme (included in assets)
