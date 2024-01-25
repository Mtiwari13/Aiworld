(function (api) {
  // Extends our custom "newsx-pro" section.
  api.sectionConstructor["ai-blog"] = api.Section.extend({
    // No events for this type of section.
    attachEvents: function () {},

    // Always make the section active.
    isContextuallyActive: function () {
      return true;
    },
  });
})(wp.customize);
