import re

with open('css/hover.css', 'r') as f:
    content = f.read()

# We need to extract the license header
header_match = re.search(r'/\*!.*?\*/', content, re.DOTALL)
header = header_match.group(0) if header_match else "/* Hover.css */"

classes_to_extract = [
    'hvr-wobble-skew',
    'hvr-grow-rotate',
    'hvr-grow-shadow'
]

# This is a bit tricky, let's just grab them using regex or manual slicing.
# For animations, we also need keyframes.
