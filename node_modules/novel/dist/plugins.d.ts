import { Plugin } from '@tiptap/pm/state';
import { DecorationSet, EditorView } from '@tiptap/pm/view';

declare const UploadImagesPlugin: ({ imageClass }: {
    imageClass: string;
}) => Plugin<DecorationSet>;
interface ImageUploadOptions {
    validateFn?: (file: File) => void;
    onUpload: (file: File) => Promise<unknown>;
}
declare const createImageUpload: ({ validateFn, onUpload }: ImageUploadOptions) => UploadFn;
type UploadFn = (file: File, view: EditorView, pos: number) => void;
declare const handleImagePaste: (view: EditorView, event: ClipboardEvent, uploadFn: UploadFn) => boolean;
declare const handleImageDrop: (view: EditorView, event: DragEvent, moved: boolean, uploadFn: UploadFn) => boolean;

export { type ImageUploadOptions, type UploadFn, UploadImagesPlugin, createImageUpload, handleImageDrop, handleImagePaste };
