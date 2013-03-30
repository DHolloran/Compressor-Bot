var codeMirrorOptions = {
			lineNumbers: true,
			matchBrackets: false,
			lineWrapping: true,
			tabSize: 4
		},
		jbInput = CodeMirror.fromTextArea(document.getElementById("jb_input"), codeMirrorOptions);
		jbOutput = CodeMirror.fromTextArea(document.getElementById("jb_output"), codeMirrorOptions);
		cbInput = CodeMirror.fromTextArea(document.getElementById("cd_input"), codeMirrorOptions);
		cbOutput = CodeMirror.fromTextArea(document.getElementById("cd_output"), codeMirrorOptions);