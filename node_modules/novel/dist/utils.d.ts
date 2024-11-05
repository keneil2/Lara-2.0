import { Editor } from '@tiptap/core';

declare function isValidUrl(url: string): boolean;
declare function getUrlFromString(str: string): string | null | undefined;
declare const getPrevText: (editor: Editor, position: number) => string;
declare const getAllContent: (editor: Editor) => string;

export { getAllContent, getPrevText, getUrlFromString, isValidUrl };
