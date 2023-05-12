export default function keyToLabel(string) {
  return string.replace(/([a-z])([A-Z])/g, '$1 $2').replace(/^./, function(str) { return str.toUpperCase(); });
};
