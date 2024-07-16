import React, { useState } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/react";

export default function Edit({ auth, errors, job }) {
  const [formData, setFormData] = useState({
    title: job?.title || '',
    salary: job?.salary || '',
  });

  const csrfToken = document.querySelector("meta[name='csrf-token']").getAttribute("content");

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmitDelete = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch(`/jobs/${job.id}`, {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
        },
      });

      if (!response.ok) {
        const errorData = await response.text();
        console.error('Error Response:', errorData);
        throw new Error('Network response was not ok');
      }

      const data = await response.json();
      console.log('Success:', data);
      window.location.href = "/jobs"; // Redirect to the jobs list after deletion
    } catch (error) {
      console.error('Error:', error);
    }
  };


  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch(`/jobs/${job.id}`, {
        method: 'PATCH',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify(formData),
      });

      if (!response.ok) {
        const errorData = await response.text();
        console.error('Error Response:', errorData);
        throw new Error('Network response was not ok');
      }

      const data = await response.json();
      console.log('Success:', data);
      window.location.href = `/jobs/${job.id}`; // Redirect to the job detail after update
    } catch (error) {
      console.error('Error:', error);
    }
  };

  if (!job) {
    return (
      <AuthenticatedLayout user={auth.user}>
        <Head title="Edit Job" />
        <div className="mx-10 my-6">
          <h2 className="text-xl font-semibold text-gray-800 dark:text-gray-300 leading-tight">
            Job not found.
          </h2>
        </div>
      </AuthenticatedLayout>
    );
  }

  return (
    <AuthenticatedLayout
      user={auth.user}
      header={
        <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
          Edit Job: {job.title}
        </h2>
      }
    >
      <Head title="Edit Job" />

      <div className="mx-10 my-6">
        <div className="space-y-2 border-b border-gray-900/10 pb-6">
          <h2 className="text-base font-semibold leading-7 text-gray-900">
            Profile
          </h2>
          <p className="mt-1 text-sm leading-6 text-gray-600">
            This information will be displayed publicly, so be careful about
            what you share.
          </p>

          <form onSubmit={handleSubmit}>
            <input type="hidden" name="_token" value={csrfToken} />
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
                    value={formData.title}
                    onChange={handleChange}
                    className="block flex-1 border-0 bg-transparent py-1.5 pl-1 mx-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                    placeholder="Job title"
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
                    value={formData.salary}
                    onChange={handleChange}
                    className="block flex-1 border-0 bg-transparent py-1.5 pl-1 mx-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                    placeholder="Job salary"
                  />
                </div>
              </div>
              {errors && (
                <p className="mt-2 text-sm text-red-600">{errors.salary}</p>
              )}
            </div>
            <div className="mt-6 flex items-center justify-end gap-x-6">
              <a
                href={`/jobs/${job.id}`}
                className="text-sm font-semibold leading-6 text-gray-900"
              >
                Cancel
              </a>
              <a
                href={`/jobs/${job.id}`}
                type="submit"
                className="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
              >
                Update
              </a>
            </div>
          </form>

          <div className="mt-3 gap-x-6">
            <form id="deleteForm" onSubmit={handleSubmitDelete}>
              <button
                type="submit"
                className="text-sm font-semibold text-red-600"
              >
                Delete
              </button>
            </form>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
