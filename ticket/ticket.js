const editor = new EditorJS({
    /**
     * Id of Element that should contain the Editor
     */
    holderId : 'editorjs',
  
    /**
     * Available Tools list.
     * Pass Tool's class or Settings object for each Tool you want to use
     */
    tools: {
      header: {
        class: Header,
        inlineToolbar : true
      },
      // ...
    },
  
    /**
     * Previously saved data that should be rendered
     */
    data: {}
  });