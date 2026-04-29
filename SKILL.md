---
name: aka-seo-wireframe
version: 2.0.0
description: A 3-tier topical content framework (Authority → Knowledge → Answer) for building authority sites that rank on both Google and AI-powered search (ChatGPT, Claude, Perplexity, AI Overviews). Use when planning content structure for any niche, generating pillar content strategies, scaling SEO content with topical clustering, or building authority sites at 100+ pages.
---

# AKA SEO Wireframe

A 3-tier content architecture that mirrors how both Google AND large language models build their understanding of a topic. Designed for authority sites at scale (50-330+ pages).

**Generate in hours what typically takes weeks of manual planning.**

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

## Output Per Hub
- 1 Authority page (4,000 words)
- 15 Knowledge pages (30,000 words total)
- 25 Answer pages (25,000 words total)
- 300+ internal links
- Complete topical clustering

## Full Site (5 hubs)
- 5 Authority hubs
- 75 Knowledge pages
- 125 Answer pages
- **205 total pages**
- 1,500+ internal links

## Why Both Google AND LLMs Reward This

### Google
- **Topical Authority** — hub-and-spoke is exactly what the algorithm rewards
- **EEAT signals** — Authority hubs establish trust, Knowledge demonstrates expertise
- **Helpful Content** — comprehensive + deep + connected (post-2024 update)

### LLMs (ChatGPT, Claude, Perplexity, AI Overviews)
- **Authority pages** = "this site is THE expert on X" signal
- **Knowledge pages** = depth signal — site doesn't just mention, it understands
- **Answer pages** = direct match to AI-generated answer formats

When LLMs crawl AKA-structured content, they map it as a comprehensive resource and cite it instead of skipping it.

## Implementation Workflow

### Step 1: Setup — Collect Project Variables

Gather these 15 inputs before starting:

1. Business name
2. Industry / niche
3. Location (City, State / Region)
4. Service radius
5. Primary service (→ first Authority Hub)
6. Secondary services (→ additional Authority Hubs)
7. Target audience
8. Top 3 customer pain points
9. Brand voice
10. Unique value proposition
11. Phone number
12. Email
13. Business address
14. Hours of operation
15. Trust signals (years in business, clients served, certifications, awards)

### Step 2: Generate the AKA Strategy

Create the complete wireframe based on the inputs:

- 5-7 Authority Hub topics derived from the primary + secondary services
- 12-15 Knowledge page topics per hub (deep-dives on specific aspects)
- 20-30 Answer page topics per hub (long-tail questions, FAQs)
- Complete URL structure mapping
- Keyword mapping per page (head, mid-tail, long-tail)

See `references/strategy-planner.md` for detailed strategy generation.

### Step 3: Generate the Content

Create all content with variable injection so brand details auto-populate:

- Authority pages (4,000 words each, comprehensive coverage of the hub topic)
- Knowledge pages (2,000 words each, focused deep-dive on a specific subtopic)
- Answer pages (1,000 words each, FAQ format optimized for featured snippets)
- Add internal link placeholders that get resolved in the next step

See `references/content-generator.md` for content generation patterns.
See `references/prompts-library.md` for tested prompt templates.

### Step 4: Build the Internal Linking Structure

Convert link placeholders into the actual hub-and-spoke structure:

- Authority hubs link to all their Knowledge and Answer pages
- Knowledge pages link to their parent Authority and to related Knowledge pages
- Answer pages link to their parent Authority and to relevant Knowledge pages
- 1,500+ contextual internal links at the full site scale

### Step 5: SEO Optimization Pass

Final QA on the content set:

- Unique meta titles and descriptions per page
- Schema markup recommendations (LocalBusiness, Service, FAQ)
- No duplicate H1s across the site
- Canonical tags
- Image alt text
- Heading hierarchy

See `references/seo-optimizer.md` for the QA checklist.

## Reference Files

- `references/strategy-planner.md` — How to derive hubs and pages from business inputs
- `references/content-generator.md` — Content generation patterns per page type
- `references/prompts-library.md` — Tested prompt templates for each page type
- `references/seo-optimizer.md` — Final QA checklist
- `references/orchestrator.md` — How to sequence all the steps end-to-end

## Variables Used

All content generation uses these placeholders that get replaced with the project values:

- `{{BUSINESS_NAME}}`
- `{{LOCATION}}` or `{{CITY}}, {{STATE}}`
- `{{INDUSTRY}}`
- `{{PRIMARY_SERVICE}}`
- `{{PHONE}}`
- `{{EMAIL}}`
- `{{HOURS}}`
- `{{UNIQUE_VALUE}}`
- `{{PAIN_POINT_1}}`, `{{PAIN_POINT_2}}`, `{{PAIN_POINT_3}}`
- `{{BRAND_VOICE}}`
- `{{TRUST_SIGNALS}}`

## Quality Standards

Every Authority page must have:
- A strong, opinionated thesis (not generic listicle content)
- Clear topical authority signals (define terms, address misconceptions)
- Internal links to all child Knowledge and Answer pages
- EEAT-aligned content (real expertise, not surface-level)

Every Knowledge page must have:
- Genuine depth on its specific subtopic (no filler)
- Original framing or insight (not a summary of other articles)
- Internal links to parent Authority + 2-3 related Knowledge pages
- Practical application or examples

Every Answer page must have:
- A direct answer in the first 2 sentences (featured snippet optimization)
- Question framed exactly as people search it
- Internal links back to parent Authority + 1-2 relevant Knowledge pages
- Concise and scannable

## What This Framework Is NOT

- Not a templating system that swaps variables — content must have genuine depth per page
- Not "wide and shallow" SEO from the 2020 era — Google now demotes that
- Not platform-specific — works for any CMS, static site, or custom build
- Not a substitute for real expertise — it's a structure for organizing real expertise at scale

## How to Use This Framework

This is platform-agnostic. Use it however fits your workflow:

- Paste this SKILL.md as a system prompt in any AI tool (ChatGPT, Claude, Gemini, Perplexity)
- Use it as a methodology document for human content teams
- Reference it when briefing freelance writers
- Adapt the variable structure to your CMS
