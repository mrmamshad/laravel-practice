import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Create({ auth, errors }) {
  console.log(errors);

  const csrfToken = document.querySelector("meta[name='csrf-token']").getAttribute("content");
  return (
    <AuthenticatedLayout
      user={auth.user}
      header={
        <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
          Create Job
        </h2>
      }
    >
      <Head title="Create" />
      <form method="POST"  action="/jobs/create">

      <input type="hidden" name="_token" value={csrfToken} />
        <div className=" mx-10 my-6 ">
          <div className="space-y-2 border-b border-gray-900/10 pb-6">
            <h2 className="text-base font-semibold leading-7 text-gray-900">
              Profile
            </h2>
            <p className="mt-1 text-sm leading-6 text-gray-600">
              This information will be displayed publicly, so be careful about
              what you share.
            </p>

            <div className="sm:col-span-4">
              <label
                htmlFor="title"
                className="block text-sm font-medium leading-6 text-gray-900"
              >
                Title
              </label>
              <div className="mt-2">
                <div className="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                  <input
                    type="text"
                    name="title"
                    id="title"
                  className="block flex-1 border-0 bg-transparent py-1.5 pl-1 mx-3  text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                    placeholder="job title"
                  />
                </div>
              </div>

              {errors && (
                <p className="mt-2 text-sm text-red-600">{errors.title}</p>
              )}

              <label
                htmlFor="salary"
                className="block text-sm font-medium leading-6 text-gray-900"
              >
                Salary
              </label>
              <div className="mt-2">
                <div className="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                  <input
                    type="text"
                    name="salary"
                    id="salary"
                    className="block flex-1 border-0 bg-transparent py-1.5 pl-1 mx-3  text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                    placeholder="job salary"
                  />
                </div>
              </div>
              {errors && (
                <p className="mt-2 text-sm text-red-600">{errors.salary}</p>
              )}
            </div>
            <div className="mt-6 flex items-center justify-end gap-x-6">
              <button
                type="button"
                className="text-sm font-semibold leading-6 text-gray-900"
              >
                Cancel
              </button>
              <button
                type="submit"
                className="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
              >
                Save
              </button>
            </div>
          </div>
        </div>
      </form>
    </AuthenticatedLayout>
  );
}
